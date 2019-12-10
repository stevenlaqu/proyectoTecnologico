package com.example.smartgarden;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;

public class RegistroValidarActivity extends AppCompatActivity  implements View.OnClickListener {

    Button btnCont;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_registro_validar);
        setTitle("Validar Datos");
        btnCont = findViewById(R.id.btnValCont);
        btnCont.setOnClickListener(this);
    }

    @Override
    public void onClick(View v) {
        switch (v.getId()) {
            case R.id.btnValCont:
                mostrarContrasena();
                break;
        }
    }

    private void mostrarContrasena() {
        startActivity(new Intent(this,RegistroContrasenaActivity.class));
    }
}
