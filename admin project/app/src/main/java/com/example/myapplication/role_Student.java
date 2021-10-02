package com.example.myapplication;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.text.TextUtils;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ProgressBar;
import android.widget.Toast;

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
import com.google.firebase.firestore.DocumentReference;
import com.google.firebase.firestore.DocumentSnapshot;
import com.google.firebase.firestore.FirebaseFirestore;

import java.util.HashMap;
import java.util.Map;

public class role_Student extends AppCompatActivity {

    private EditText remail, rpass;
    private Button lbtn;
    private ProgressBar progressBar;
    private String email, password;
    private FirebaseAuth fauth;
    private FirebaseFirestore fstore;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_role__student);

        remail = findViewById(R.id.remail);
        rpass = findViewById(R.id.rpass);
        lbtn = findViewById(R.id.lbtn);
        progressBar = findViewById(R.id.progressBar2);
        fauth = FirebaseAuth.getInstance();
        fstore = FirebaseFirestore.getInstance();


        lbtn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
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

                //Firebase....

                fauth.signInWithEmailAndPassword(email,password).addOnCompleteListener(new OnCompleteListener<AuthResult>() {
                    @Override
                    public void onComplete(@NonNull Task<AuthResult> task) {
                        if(task.isSuccessful()){
                            Toast.makeText(role_Student.this,"Welcome "+email,Toast.LENGTH_SHORT).show();
                            CheckUserAccess(task.getResult().getUser().getUid());
//                            Intent intent = new Intent(role_Student.this,Student_nevigation.class);
//                            startActivity(intent);
//                            finish();
                        }
                        else {
                            Toast.makeText(role_Student.this,""+task.getException().getMessage(),Toast.LENGTH_SHORT).show();
                            progressBar.setVisibility(View.GONE);
                        }
                    }
                });
            }
        });


    }

    private void CheckUserAccess(String uid){
        DocumentReference dr = fstore.collection("Students").document(uid);
        dr.get().addOnSuccessListener(new OnSuccessListener<DocumentSnapshot>() {
            @Override
            public void onSuccess(DocumentSnapshot documentSnapshot) {
                Log.d("TAG","onSuccess: "+ documentSnapshot.getData());

                if(documentSnapshot.getString("isUser")!= null){
                    startActivity(new Intent(getApplicationContext(),Dashbord.class));
                    finish();
                }
                if(documentSnapshot.getString("isFaculty")!= null){
                    startActivity(new Intent(getApplicationContext(),Commonboard.class));
                    finish();
                }
                if(documentSnapshot.getString("isHod")!= null){
                    startActivity(new Intent(getApplicationContext(),Commonboard.class));
                    finish();
                }
                if(documentSnapshot.getString("isPrincipal")!= null){
                    startActivity(new Intent(getApplicationContext(),Commonboard.class));
                    finish();
                }
//                else {
//                    Toast.makeText(getApplicationContext(),"failed",Toast.LENGTH_SHORT).show();
//                }
            }
        }).addOnFailureListener(new OnFailureListener() {
            @Override
            public void onFailure(@NonNull Exception e) {
//                Toast.makeText(role_Student.this,"Failed",Toast.LENGTH_SHORT).show();

            }
        });
    }

    public void register(View view) {
        Intent intent = new Intent(role_Student.this, Register.class);
        startActivity(intent);
        finish();
    }

}

