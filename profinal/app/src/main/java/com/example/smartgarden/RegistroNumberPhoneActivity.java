package com.example.smartgarden;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;

public class RegistroNumberPhoneActivity extends AppCompatActivity implements View.OnClickListener {

    Button btnCont;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_registro_number_phone);
        setTitle("Número de teléfono");
        btnCont = findViewById(R.id.btnCellCont);

        btnCont.setOnClickListener(this);
    }

    @Override
    public void onClick(View v) {
        switch (v.getId()){
            case R.id.btnCellCont:
                mostrarDni();
                break;

        }
    }

    private void mostrarDni() {
        startActivity(new Intent(this, RegistroDniActivity.class));
    }
}
