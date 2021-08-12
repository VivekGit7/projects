package com.example.weatherapp;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;
import androidx.core.app.ActivityCompat;

import android.Manifest;
import android.content.Context;
import android.content.Intent;
import android.content.pm.PackageManager;
import android.location.Location;
import android.location.LocationListener;
import android.location.LocationManager;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.ProgressBar;
import android.widget.TextView;
import android.widget.Toast;

import com.loopj.android.http.AsyncHttpClient;
import com.loopj.android.http.JsonHttpResponseHandler;
import com.loopj.android.http.RequestParams;

import org.json.JSONObject;

import cz.msebera.android.httpclient.Header;

public class MainActivity extends AppCompatActivity {

    final String API_ID = "Yourapi id...";
    final String WEATHER_URL = "https://api.openweathermap.org/data/2.5/weather";

    final long MIN_TIME = 5000;
    final long MIN_DISTANCE = 1000;
    final int REQUEST_CODE = 101;

    String Location_provider = LocationManager.GPS_PROVIDER;


    TextView cityname, weatherstate, temperature;
    ImageView icon;
    ProgressBar progressBar;

    Button searchbutton;

    LocationManager locationManager;
    LocationListener locationListener;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);


        cityname = (TextView) findViewById(R.id.city);
        temperature = (TextView) findViewById(R.id.temperature);
        weatherstate = (TextView) findViewById(R.id.condition);
        icon = (ImageView) findViewById(R.id.weathericon);
        searchbutton = (Button) findViewById(R.id.searchbtn);
        progressBar = findViewById(R.id.progressbar);

        searchbutton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(MainActivity.this, findcity.class);
                startActivity(intent);
            }
        });
    }

//    @Override
//    protected void onResume() {
//        super.onResume();
//
//        getweatherforcurrentlocation();
//    }


    @Override
    protected void onResume() {
        super.onResume();
        Intent mintent = getIntent();
        String city = mintent.getStringExtra("city");

        if (city != null) {
            getweatherfornewcity(city);
            progressBar.setVisibility(View.VISIBLE);
        } else {
            getweatherforcurrentlocation();
            progressBar.setVisibility(View.VISIBLE);
        }
    }

    private void getweatherfornewcity(String city) {
        RequestParams params = new RequestParams();
        params.put("q", city);
        params.put("appid", API_ID);
        Apifetch(params);
    }

    private void getweatherforcurrentlocation() {


        locationManager = (LocationManager) getSystemService(Context.LOCATION_SERVICE);
        if (ActivityCompat.checkSelfPermission(this, Manifest.permission.ACCESS_FINE_LOCATION) != PackageManager.PERMISSION_GRANTED && ActivityCompat.checkSelfPermission(this, Manifest.permission.ACCESS_COARSE_LOCATION) != PackageManager.PERMISSION_GRANTED) {
            // TODO: Consider calling
            //    ActivityCompat#requestPermissions
            // here to request the missing permissions, and then overriding
            //   public void onRequestPermissionsResult(int requestCode, String[] permissions,
            //                                          int[] grantResults)
            // to handle the case where the user grants the permission. See the documentation
            // for ActivityCompat#requestPermissions for more details.
            return;
        }
        Location location = locationManager.getLastKnownLocation(LocationManager.GPS_PROVIDER);
        locationListener = new LocationListener() {
            @Override
            public void onLocationChanged(Location location) {
                String Latitude = String.valueOf(location.getLatitude());
                String Longitude = String.valueOf(location.getLongitude());

                RequestParams params=new RequestParams();
                params.put("lat" ,Latitude);
                params.put("lon" ,Longitude);
                params.put("appid" ,API_ID);

                Apifetch(params);

            }
        };

        if (ActivityCompat.checkSelfPermission(this, Manifest.permission.ACCESS_FINE_LOCATION) != PackageManager.PERMISSION_GRANTED && ActivityCompat.checkSelfPermission(this, Manifest.permission.ACCESS_COARSE_LOCATION) != PackageManager.PERMISSION_GRANTED) {
            // TODO: Consider calling
            //    ActivityCompat#requestPermissions
            // here to request the missing permissions, and then overriding
            //   public void onRequestPermissionsResult(int requestCode, String[] permissions,
            //                                          int[] grantResults)
            // to handle the case where the user grants the permission. See the documentation
            // for ActivityCompat#requestPermissions for more details.
            ActivityCompat.requestPermissions(this,new String[]{
                    Manifest.permission.ACCESS_FINE_LOCATION,
                    Manifest.permission.ACCESS_COARSE_LOCATION
            },REQUEST_CODE);
            return;
        }

        locationManager.requestLocationUpdates(Location_provider, MIN_TIME, MIN_DISTANCE, locationListener);

    }


    @Override
    public void onRequestPermissionsResult(int requestCode, @NonNull String[] permissions, @NonNull int[] grantResults) {
        super.onRequestPermissionsResult(requestCode, permissions, grantResults);

        if(requestCode==REQUEST_CODE){
            if(grantResults.length>0 && grantResults[0]==PackageManager.PERMISSION_GRANTED){
                Toast.makeText(MainActivity.this,"Success",Toast.LENGTH_SHORT).show();
                getweatherforcurrentlocation();
            }
            else {
                //permission denied
            }
        }
    }

    private void Apifetch(RequestParams params){
        AsyncHttpClient client=new AsyncHttpClient();
        client.get(WEATHER_URL,params,new JsonHttpResponseHandler(){

            @Override
            public void onSuccess(int statusCode, Header[] headers, JSONObject response) {
                //super.onSuccess(statusCode, headers, response);
                Toast.makeText(MainActivity.this,"success",Toast.LENGTH_SHORT).show();

                Weatherdata weatherdata=Weatherdata.fromJson(response);
                updateUI(weatherdata);
                progressBar.setVisibility(View.GONE);
            }

            @Override
            public void onFailure(int statusCode, Header[] headers, Throwable throwable, JSONObject errorResponse) {
                //super.onFailure(statusCode, headers, throwable, errorResponse);
                Toast.makeText(MainActivity.this,"failed",Toast.LENGTH_SHORT).show();
                progressBar.setVisibility(View.GONE);
            }
        });
    }

    private void updateUI(Weatherdata weatherdata){
        temperature.setText(weatherdata.getMtemperature());
        cityname.setText(weatherdata.getMcity());
        weatherstate.setText(weatherdata.getmWtype());
        int ResourceId=getResources().getIdentifier(weatherdata.getMicon(),"drawable",getPackageName());
        icon.setImageResource(ResourceId);
    }

    @Override
    protected void onPause() {
        super.onPause();
        if(locationManager!=null){
            locationManager.removeUpdates(locationListener);
        }
    }
}