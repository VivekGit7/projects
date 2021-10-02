package com.example.myapplication;

import androidx.annotation.Nullable;
import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.MenuItem;
import android.view.View;
import android.widget.TextView;

import com.google.firebase.auth.FirebaseAuth;
import com.google.firebase.firestore.DocumentReference;
import com.google.firebase.firestore.DocumentSnapshot;
import com.google.firebase.firestore.EventListener;
import com.google.firebase.firestore.FirebaseFirestore;
import com.google.firebase.firestore.FirebaseFirestoreException;

public class Dashbord extends AppCompatActivity {

    private FirebaseAuth fauth;
    private FirebaseFirestore fstore;
    TextView Username;
    String userId;
    String[] urls=new String[5];

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_dashbord);

        fauth = FirebaseAuth.getInstance();
        fstore = FirebaseFirestore.getInstance();
        Username = findViewById(R.id.sname);
        userId = fauth.getCurrentUser().getUid();

        DocumentReference dr = fstore.collection("Students").document(userId);
        dr.addSnapshotListener(this, new EventListener<DocumentSnapshot>() {
            @Override
            public void onEvent(@Nullable DocumentSnapshot value, @Nullable FirebaseFirestoreException error) {
                Username.setText(value.getString("Username"));
            }
        });


        urls[0]="https://scet.ac.in/CO";
        urls[1]="file:///android_asset/timetable.html";
        urls[2]="https://www.gturesults.in/";
        urls[3]="https://scetengg.adaptable.in";
        urls[4]="https://timetable.gtu.ac.in";

    }


    public void web(View view) {
        Intent intent=new Intent(getApplicationContext(),Web.class);
        intent.putExtra("Links",urls[0]);
        startActivity(intent);
        finish();
    }

    public void web1(View view) {
        Intent intent=new Intent(getApplicationContext(),Web.class);
        intent.putExtra("Links",urls[1]);
        startActivity(intent);
        finish();
    }

    public void web2(View view) {
        Intent intent=new Intent(getApplicationContext(),Web.class);
        intent.putExtra("Links",urls[2]);
        startActivity(intent);
        finish();
    }

    public void web3(View view) {
        Intent intent=new Intent(getApplicationContext(),Web.class);
        intent.putExtra("Links",urls[3]);
        startActivity(intent);
        finish();
    }

    public void webt(View item) {
        Intent intent=new Intent(getApplicationContext(),Web.class);
        intent.putExtra("Links",urls[4]);
        startActivity(intent);
        finish();
    }

    public void out(View view) {
        FirebaseAuth.getInstance().signOut();
        startActivity(new Intent(getApplicationContext(),MainActivity.class));
        finish();
    }
}