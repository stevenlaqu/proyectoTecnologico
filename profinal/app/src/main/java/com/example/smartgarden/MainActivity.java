package com.example.smartgarden;

import androidx.appcompat.app.AlertDialog;
import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.JsonObjectRequest;
import com.android.volley.toolbox.Volley;

import org.json.JSONException;
import org.json.JSONObject;

import java.lang.annotation.ElementType;
import java.util.HashMap;
import java.util.Map;

public class MainActivity extends AppCompatActivity  implements TextView.OnClickListener{
    String uri_server;



    Button btnIniSes, btnRegistro;
    TextView lblOlvide;
    EditText txtUser, txtPass;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        uri_server= getString(R.string.server_uri);


        btnIniSes = findViewById(R.id.btnIni);
        btnRegistro = findViewById(R.id.btnReg);
        lblOlvide = findViewById(R.id.lblOlvide);
        txtUser =findViewById(R.id.txtUserLogin);
        txtPass =findViewById(R.id.txtPassLogin);


        btnRegistro.setOnClickListener(this);
        btnIniSes.setOnClickListener(this);
        lblOlvide.setOnClickListener(this);
    }


    @Override
    public void onClick(View v) {
        switch (v.getId()){
            case R.id.btnReg:
                mostrarCrearCuenta();
                break;
            case R.id.btnIni:
                inicioSesion();
                break;
            case R.id.lblOlvide:
                mostrarRecuperarContrasena();
                break;
        }
    }



    private void mostrarRecuperarContrasena() {

    }


    private void inicioSesion() {
        RequestQueue queue = Volley.newRequestQueue(this);
        String url= uri_server+"/Login.php";
        Log.v("url",url);
        Map<String,String> postValues = new HashMap<String,String>();
        postValues.put("user",txtUser.getText().toString());
        postValues.put("pass",txtPass.getText().toString());
        JSONObject jsonPostValues = new JSONObject(postValues);

        JsonObjectRequest jor = new JsonObjectRequest(Request.Method.POST, url, jsonPostValues,  new Response.Listener<JSONObject>()
        {
            @Override
            public void onResponse(JSONObject response) {
                mostrarPerfil(response);
            }
        },new Response.ErrorListener(){
            @Override
            public void onErrorResponse(VolleyError error){
                Log.e("inicioSesion",error.getMessage());
            }
        });
        queue.add(jor);
    }
    private void mostrarPerfil(JSONObject jsonObject) {
        String result = "";
        try{
            result = jsonObject.getString("login") ;
        }catch (JSONException error){
            Log.e("mostrarPerfil",error.getMessage());
        }
        if(result.equals("OK")){
            startActivity(new Intent(this, HomeSmartGardenActivity.class));
        }else {
            mostrarDialogo("Usuario o contraseña incorrecto.");
        }
    }

    private void mostrarCrearCuenta() {
        startActivity(new Intent(this,RegistroIniActivity.class));
    }

    private void mostrarDialogo(String msg) {
        final String msj = msg;
        AlertDialog.Builder builder = new AlertDialog.Builder(this);
        LayoutInflater inflater = getLayoutInflater();
        View v = inflater.inflate(R.layout.dialogo1,null);
        builder.setView(v);

        final AlertDialog dialog = builder.create();
        dialog.show();

        Button btnok = v.findViewById(R.id.btnok);
        btnok.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Toast.makeText(getApplicationContext(),msj, Toast.LENGTH_SHORT ).show();
                dialog.dismiss();
            }
        });
    }
}
