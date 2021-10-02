package com.example.myapplication;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.Spinner;
import android.widget.Toast;

import com.google.android.gms.tasks.OnFailureListener;
import com.google.android.gms.tasks.OnSuccessListener;
import com.google.firebase.auth.FirebaseAuth;
import com.google.firebase.auth.FirebaseUser;
import com.google.firebase.firestore.DocumentReference;
import com.google.firebase.firestore.DocumentSnapshot;
import com.google.firebase.firestore.FirebaseFirestore;

public class MainActivity extends AppCompatActivity implements AdapterView.OnItemSelectedListener {

    private FirebaseAuth fauth;
    private FirebaseFirestore fstore;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        fauth = FirebaseAuth.getInstance();
        fstore = FirebaseFirestore.getInstance();
//        getSupportActionBar().hide();

        Spinner spinner = (Spinner) findViewById(R.id.spinner);
        ArrayAdapter<CharSequence> adapter = ArrayAdapter.createFromResource(this, R.array.role, android.R.layout.simple_spinner_item);
        adapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        spinner.setAdapter(adapter);
        spinner.setOnItemSelectedListener(this);
    }

    @Override
    protected void onStart() {
        super.onStart();

        if(fauth.getCurrentUser() != null){
            FirebaseUser user = fauth.getCurrentUser();
            CheckUserAccess(user.getUid());
            finish();
        }
    }


    @Override
    public void onItemSelected(AdapterView<?> parent, View view, int position, long id) {
        if(parent.getItemAtPosition(position).equals("Select Role")){
            //do nothing
        }
        else {
            String choice=parent.getItemAtPosition(position).toString();
            Toast.makeText(getApplicationContext(),choice,Toast.LENGTH_LONG).show();

            if(parent.getItemAtPosition(position).equals("Student")){
                Intent intent = new Intent(MainActivity.this,role_Student.class);
                startActivity(intent);
            }
            else if(parent.getItemAtPosition(position).equals("Faculty")){
                Intent intent = new Intent(MainActivity.this,role_Faculty.class);
                startActivity(intent);
            }
            else if(parent.getItemAtPosition(position).equals("Principal")){
                Intent intent = new Intent(MainActivity.this,role_Principal.class);
                startActivity(intent);
            }
            else if(parent.getItemAtPosition(position).equals("HOD")){
                Intent intent = new Intent(MainActivity.this,role_HOD.class);
                startActivity(intent);
            }

        }

    }

    @Override
    public void onNothingSelected(AdapterView<?> parent) {

    }

    private void CheckUserAccess(String uid){
        DocumentReference dr = fstore.collection("Students").document(uid);
        dr.get().addOnSuccessListener(new OnSuccessListener<DocumentSnapshot>() {
            @Override
            public void onSuccess(DocumentSnapshot documentSnapshot) {
                Log.d("TAG","onSuccess: "+ documentSnapshot.getData());

                if(documentSnapshot.getString("isUser")!= null){
                    startActivity(new Intent(getApplicationContext(), Dashbord.class));
                }
                if(documentSnapshot.getString("isFaculty")!= null){
                    startActivity(new Intent(getApplicationContext(),Commonboard.class));
                }
                if(documentSnapshot.getString("isHod")!= null){
                    startActivity(new Intent(getApplicationContext(),Commonboard.class));
                }
                if(documentSnapshot.getString("isPrincipal")!= null){
                    startActivity(new Intent(getApplicationContext(),Commonboard.class));
                }
//                else {
//                    Toast.makeText(getApplicationContext(),"failed",Toast.LENGTH_SHORT).show();
//                }
            }
        }).addOnFailureListener(new OnFailureListener() {
            @Override
            public void onFailure(@NonNull Exception e) {
                Toast.makeText(getApplicationContext(),"Failed",Toast.LENGTH_SHORT).show();

            }
        });
    }



}