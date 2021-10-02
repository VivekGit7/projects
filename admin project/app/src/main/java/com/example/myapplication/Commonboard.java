package com.example.myapplication;

import androidx.annotation.Nullable;
import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;

import com.google.firebase.auth.FirebaseAuth;
import com.google.firebase.firestore.DocumentReference;
import com.google.firebase.firestore.DocumentSnapshot;
import com.google.firebase.firestore.EventListener;
import com.google.firebase.firestore.FirebaseFirestore;
import com.google.firebase.firestore.FirebaseFirestoreException;

public class Commonboard extends AppCompatActivity {

    private Button button;
    private FirebaseAuth fauth;
    private FirebaseFirestore fstore;
    TextView Username,Email;
    String userId;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_commonboard);

        fauth = FirebaseAuth.getInstance();
        fstore = FirebaseFirestore.getInstance();
        Username = findViewById(R.id.uname);
        Email = findViewById(R.id.Email);

        userId = fauth.getCurrentUser().getUid();

        DocumentReference dr = fstore.collection("Students").document(userId);
        dr.addSnapshotListener(this, new EventListener<DocumentSnapshot>() {
            @Override
            public void onEvent(@Nullable DocumentSnapshot value, @Nullable FirebaseFirestoreException error) {
                Username.setText(value.getString("Username"));
                Email.setText(value.getString("Email"));
            }
        });


        button = (Button) findViewById(R.id.Cbutton);

        button.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                FirebaseAuth.getInstance().signOut();
                startActivity(new Intent(getApplicationContext(),MainActivity.class));
                finish();
            }
        });


    }
}