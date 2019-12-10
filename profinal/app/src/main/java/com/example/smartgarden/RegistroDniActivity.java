package com.example.smartgarden;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;

public class RegistroDniActivity extends AppCompatActivity implements View.OnClickListener {

    Button btnCont;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_registro_dni);
        setTitle("Documento");

        btnCont = findViewById(R.id.btnDniCont);

        btnCont.setOnClickListener(this);
    }

    @Override
    public void onClick(View v) {
        switch (v.getId()){
            case R.id.btnDniCont:
                mostrarvalidar();
                break;

        }
    }

    private void mostrarvalidar() {
        startActivity(new Intent(this, RegistroValidarActivity.class));
    }
}
