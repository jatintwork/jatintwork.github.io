import pandas as pd
import matplotlib.pyplot as plt
import numpy as np
import numpy as np
import math

#Machine learing modules
from sklearn.preprocessing import MinMaxScaler 
from tensorflow.keras.models import Sequential
from tensorflow.keras.layers import Dense, Dropout, LSTM
    
    
def hii():
    
    return("Hii Jatin")

def prediction_image(name):
    if(True):
        
        print(name)
        #Load Data
        company = name


        df = pd.read_csv(f'https://www.alphavantage.co/query?function=TIME_SERIES_weekly&symbol={name}.BSE&datatype=csv&apikey=FH07SZXZ2ONHNOOO',parse_dates=True, index_col=0)
        
        test_data = df
        data = df[::-1].reset_index(drop = True) #reversing the dataframe
        print(data)
        data_size = df.shape[0] #Size of data
        print(data_size)
        data_size = math.floor(data_size/10)  
        print(data_size)


        test_data =test_data.iloc[:data_size] #Selecting data_size  to predict
        test_data=test_data[::-1] 

        #Prepare Data
        scaler=MinMaxScaler(feature_range=(0,1)) #Converting in ragne of  and 1 so that values could't make bigger
        scaled_data=scaler.fit_transform(data['close'].values.reshape(-1,1))

        prediction_days = data_size

        x_train=[]
        y_train=[]

        for x in range(prediction_days, len(scaled_data)):
            x_train.append(scaled_data[x-prediction_days:x, 0])
            y_train.append(scaled_data[x, 0])

        x_train, y_train = np.array(x_train), np.array(y_train)
        x_train = np.reshape(x_train, (x_train.shape[0], x_train.shape[1], 1))

        #Build the Model
        model = Sequential()

        model.add(LSTM(units=50, return_sequences=True, input_shape=(x_train.shape[1], 1)))
        model.add(Dropout(0.2))
        model.add(LSTM(units=50, return_sequences=True))
        model.add(Dropout(0.2))
        model.add(LSTM(units=50))
        model.add(Dropout(0.2))
        model.add(Dense(units=1)) #prediction of the next closing value

        model.compile(optimizer='adam', loss='mean_squared_error')
        model.fit(x_train, y_train, epochs=30, batch_size=32) #Epochs

        '''Test the model accuracy on existing data'''

        #Load Test Data

         
        actual_prices=test_data['close'].values
    
        total_dataset=pd.concat((data['close'], test_data['close']), axis=0)

        model_inputs=total_dataset[len(total_dataset)-len(test_data)-prediction_days:].values
        model_inputs = model_inputs.reshape(-1, 1)
        model_inputs = scaler.transform(model_inputs)

        # Make Predictions on Test Data
        x_test=[]

        for x in range(prediction_days, len(model_inputs)):
            x_test.append(model_inputs[x-prediction_days:x, 0])

        x_test=np.array(x_test)
        x_test=np.reshape(x_test, (x_test.shape[0], x_test.shape[1], 1))

        predicted_prices=model.predict(x_test) #It is in in 0. something format
        predicted_prices=scaler.inverse_transform(predicted_prices) #converting them into actual data    


        # Plot the test predictions

        plt.plot(test_data['close'], color = "black", label=f"Actual {company} Price") #THis is actual graph
        plt.title(f"{company} Share Price")
        plt.xlabel("Time")
        plt.xticks(rotation =60)
        plt.ylabel(f"{company} Share Price")
        plt.legend()
        plt.savefig(r'price_prediction\static\img\Graph_images\graph_actual.png',dpi=900,facecolor='beige', bbox_inches="tight",pad_inches=0.3, transparent=True)
        plt.close()
        
        
        '''
        I am adding this to test dataframe because i want to show date.. I tried many methods but it wasn't working ..
        that is why I am usign this method
        '''
        test_data['predicted_prices'] = predicted_prices #Adding this to  test data dataframe
        plt.plot(test_data['predicted_prices'], color="green", label=f"Predicted {company} Price")
        plt.title(f"{company} Predicted Share Price")
        plt.xlabel("Time")
        plt.xticks(rotation =60)
        plt.ylabel(f"{company} Share Price")
        plt.legend()
        plt.savefig(r'price_prediction\static\img\Graph_images\predicted_graph.png',dpi=900,facecolor='beige', bbox_inches="tight",pad_inches=0.3, transparent=True)
        plt.close()


       #Plotting both graphs
        plt.plot(test_data['predicted_prices'], color="green", label=f"Predicted {company} Price")
        plt.plot(test_data['close'], color="black", label=f"Actually {company} Price")

        plt.title(f"{company} Predicted + Actual Share Price")
        plt.xlabel("Time")
        plt.ylabel(f"{company} Share Price")
        plt.xticks(rotation =60)
        plt.legend()
        plt.savefig(r'price_prediction\static\img\Graph_images\prediction_actual_graph.png',dpi=900,facecolor='beige', bbox_inches="tight",pad_inches=0.3, transparent=True)
        plt.close()
        
        
        #Predict Next Day
        real_data = [model_inputs[len(model_inputs)-prediction_days:len(model_inputs+1), 0]]
        real_data = np.array(real_data)
        real_data=np.reshape(real_data, (real_data.shape[0], real_data.shape[1],1))
        prediction=model.predict(real_data)
        prediction = scaler.inverse_transform(prediction)
        prediction = prediction[0,0] #THis givs a single value
        prediction=float("{:.2f}".format(prediction)) #it elminiates number after decimals
        print(f"Prediction: {prediction}")
        return prediction
                
            
