package com.example.smartgarden;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;

public class RegistroIniActivity extends AppCompatActivity implements View.OnClickListener{
    Button btnEmp;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_registro_ini);
        setTitle("Registrarme");
        btnEmp = findViewById(R.id.btnEmpezar);
        btnEmp.setOnClickListener(this);
    }

    @Override
    public void onClick(View v) {
        switch (v.getId()){
            case R.id.btnEmpezar:
                mostrarRegistro();
                break;

        }
    }

    private void mostrarRegistro() {
        startActivity(new Intent(this,RegistroTipoServActivity.class));
    }
}
