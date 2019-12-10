package com.example.smartgarden;

import androidx.appcompat.app.AlertDialog;
import androidx.appcompat.app.AppCompatActivity;

import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.View;
import android.widget.Button;
import android.widget.Toast;

public class RegistroContrasenaActivity extends AppCompatActivity implements View.OnClickListener {

    Button btnfin;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_registro_contrasena);
        setTitle("Contraseña");

        btnfin = findViewById(R.id.btnContFin);
        btnfin.setOnClickListener(this);
    }

    @Override
    public void onClick(View v) {
        switch (v.getId()){
            case R.id.btnContFin:
                mostrarDialogo();
                break;

        }
    }

    private void mostrarDialogo() {
        AlertDialog.Builder builder = new AlertDialog.Builder(this);
        LayoutInflater  inflater = getLayoutInflater();
        View v = inflater.inflate(R.layout.dialogo1,null);
        builder.setView(v);

        final AlertDialog dialog = builder.create();
        dialog.show();

        Button btnok = v.findViewById(R.id.btnok);
        btnok.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Toast.makeText(getApplicationContext(),"Iniciando...", Toast.LENGTH_SHORT ).show();
                dialog.dismiss();
            }
        });
    }
}
