package com.example.myapplication;

import android.content.Intent;
import android.os.Bundle;
import android.os.PersistableBundle;
import android.text.TextUtils;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ProgressBar;
import android.widget.TextView;
import android.widget.Toast;

import androidx.annotation.NonNull;
import androidx.annotation.Nullable;
import androidx.appcompat.app.AppCompatActivity;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import com.google.android.gms.tasks.OnCompleteListener;
import com.google.android.gms.tasks.OnFailureListener;
import com.google.android.gms.tasks.OnSuccessListener;
import com.google.android.gms.tasks.Task;
import com.google.firebase.auth.AuthResult;
import com.google.firebase.auth.FirebaseAuth;
import com.google.firebase.auth.FirebaseUser;
import com.google.firebase.database.DatabaseReference;
import com.google.firebase.database.FirebaseDatabase;
import com.google.firebase.firestore.DocumentReference;
import com.google.firebase.firestore.FirebaseFirestore;

import java.util.HashMap;
import java.util.Map;

public class Register extends AppCompatActivity {

    private EditText ruser, remail, rpass;
    private Button rbtn;
    private ProgressBar progressBar;
    private String username, email, password;
    private FirebaseAuth fauth;
    private FirebaseDatabase root;
    private DatabaseReference reference;
    private FirebaseFirestore fstore;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.register);

        ruser = findViewById(R.id.ruser);
        remail = findViewById(R.id.remail);
        rpass = findViewById(R.id.rpass);
        rbtn = findViewById(R.id.rbtn);
        progressBar = findViewById(R.id.progressBar);
        fauth = FirebaseAuth.getInstance();
        fstore = FirebaseFirestore.getInstance();




        rbtn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                String username = ruser.getText().toString().trim();
                String email = remail.getText().toString().trim();
                String password = rpass.getText().toString().trim();

                if(TextUtils.isEmpty(email)){
                    remail.setError("Email is required.");
                    return;
                }
                if(TextUtils.isEmpty(password)) {
                    rpass.setError("Password is required.");
                    return;
                }
                if(password.length() < 6){
                    rpass.setError("Password must be greater than 5 characters.");
                    return;
                }
                progressBar.setVisibility(View.VISIBLE);


                // Firebase login......

                fauth.createUserWithEmailAndPassword(email,password).addOnSuccessListener(new OnSuccessListener<AuthResult>() {
                    @Override
                    public void onSuccess(AuthResult authResult) {
                        FirebaseUser user = fauth.getCurrentUser();
                        Toast.makeText(Register.this,"Registered",Toast.LENGTH_SHORT).show();
                        DocumentReference dr = fstore.collection("Students").document(user.getUid());
                        Map<String,Object> userinfo = new HashMap<>();
                        userinfo.put("Username",username);
                        userinfo.put("Email",email);
                        userinfo.put("Password",password);
                        userinfo.put("isUser","0");
                        //register user.....
                        dr.set(userinfo);

                        Intent intent = new Intent(Register.this,Dashbord.class);
                        startActivity(intent);
                        finish();
                    }
                }).addOnFailureListener(new OnFailureListener() {
                    @Override
                    public void onFailure(@NonNull Exception e) {
                        Toast.makeText(Register.this,"Failed",Toast.LENGTH_SHORT).show();
                        progressBar.setVisibility(View.GONE);
                    }
                });

//                fauth.createUserWithEmailAndPassword(email,password).addOnCompleteListener(new OnCompleteListener<AuthResult>() {
//                    @Override
//                    public void onComplete(@NonNull Task<AuthResult> task) {
//                        if(task.isSuccessful()){
//                            Users users = new Users(username,email,password);
//                            FirebaseDatabase.getInstance().getReference("Students")
//                                    .child(FirebaseAuth.getInstance().getCurrentUser().getUid()).setValue(users).addOnCompleteListener(new OnCompleteListener<Void>() {
//                                @Override
//                                public void onComplete(@NonNull Task<Void> task) {
//                                    if(task.isSuccessful()){
//                                        Toast.makeText(Register.this,"Registered",Toast.LENGTH_SHORT).show();
//                                        Intent intent = new Intent(Register.this,Student_nevigation.class);
//                                        startActivity(intent);
//                                        finish();
//                                    }else {
//                                        Toast.makeText(Register.this,""+task.getException().getMessage(),Toast.LENGTH_SHORT).show();
//                                        progressBar.setVisibility(View.GONE);
//                                    }
//                                }
//                            });
//                        }else {
//                            Toast.makeText(Register.this,""+task.getException().getMessage(),Toast.LENGTH_SHORT).show();
//                            progressBar.setVisibility(View.GONE);
//                        }
//                    }
//                });
            }
        });
    }


    public void login(View view) {
        Intent intent = new Intent(Register.this, role_Student.class);
        startActivity(intent);
        finish();
    }

}