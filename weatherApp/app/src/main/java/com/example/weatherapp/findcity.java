package com.example.weatherapp;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.KeyEvent;
import android.view.View;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.TextView;

public class findcity extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_findcity);

        final EditText editText=(EditText) findViewById(R.id.searchcity);
        ImageView backbutton=(ImageView) findViewById(R.id.backbtn);


        backbutton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                finish();
            }
        });

        editText.setOnEditorActionListener(new TextView.OnEditorActionListener() {
            @Override
            public boolean onEditorAction(TextView v, int actionId, KeyEvent event) {
                String newcity=editText.getText().toString();
                Intent intent=new Intent(findcity.this,MainActivity.class);
                intent.putExtra("city",newcity);
                startActivity(intent);
                finish();
                return false;
            }
        });
    }
}