from xml.etree.ElementInclude import include
from django.contrib import admin
from django.urls import path
from price_prediction import views
from price_prediction import *

urlpatterns = [


    path("", views.index , name='price_prediction'),
    path("about", views.about,name='about'),
    path("contact", views.contact,name='contact'),
    path("services", views.services,name='services'),
    path("login", views.login,name='login'),
    path("stock_info", views.stock_info, name='stock_info'),
    path('stock_name', views.stock_name, name='stock_name'),
    path('prediction', views.prediction, name='prediction'),
    path('prediction_graph', views.prediction_graph, name='prediction_graph'),
    
    
]