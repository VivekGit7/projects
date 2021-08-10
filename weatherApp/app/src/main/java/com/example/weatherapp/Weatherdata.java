package com.example.weatherapp;

import android.content.Intent;

import org.json.JSONException;
import org.json.JSONObject;

public class Weatherdata {

    private String mtemperature,micon,mcity,mWtype;
    private int mcon;

    public static Weatherdata fromJson(JSONObject jsonObject){
        try{
            Weatherdata weatherdata = new Weatherdata();
            weatherdata.mcity=jsonObject.getString("name");
            weatherdata.mcon=jsonObject.getJSONArray("weather").getJSONObject(0).getInt("id");
            weatherdata.mWtype=jsonObject.getJSONArray("weather").getJSONObject(0).getString("main");
            weatherdata.micon=updateWeatherIcon(weatherdata.mcon);
            double tempresult=jsonObject.getJSONObject("main").getDouble("temp")-273.15;
            int roundresult=(int)Math.rint(tempresult);
            weatherdata.mtemperature= Integer.toString(roundresult);

            return weatherdata;
        }
        catch (JSONException e) {
            e.printStackTrace();
            return null;
        }
    }

    private static String updateWeatherIcon(int condition){
        if(condition>=0 && condition<300){
            return "thunder";
        }
        else if(condition>=300 && condition<500){
            return "drizzle";
        }
        else if(condition>=500 && condition<600){
            return "rainy";
        }
        else if(condition>=600 && condition<700){
            return "snowy";
        }
        else if(condition>=700 && condition<750){
            return "fog";
        }
        else if(condition>=751 && condition<780){
            return "dust";
        }
        else if(condition>=781 && condition<800){
            return "tornado";
        }
        else if(condition==800){
            return "day";
        }
        else if(condition>800 && condition<900){
            return "cloudy";
        }
         return "ic_finding";
    }

    public String getMtemperature() {
        return mtemperature+"°C";
    }

    public String getMicon() {
        return micon;
    }

    public String getMcity() {
        return mcity;
    }

    public String getmWtype() {
        return mWtype;
    }
}
