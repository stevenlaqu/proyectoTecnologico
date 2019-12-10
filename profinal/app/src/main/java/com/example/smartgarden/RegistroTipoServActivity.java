package com.example.smartgarden;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.ImageView;

public class RegistroTipoServActivity extends AppCompatActivity implements View.OnClickListener {

    ImageView imgNormal, imgMedio;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_registro_tipo_serv);
        setTitle("Tipo se Servicio");
        imgNormal = findViewById(R.id.btnTipServNormal);
        imgMedio = findViewById(R.id.btnTipServMedio);

        imgNormal.setOnClickListener(this);
        imgMedio.setOnClickListener(this);
    }

    @Override
    public void onClick(View v) {
        switch (v.getId()){
            case R.id.btnTipServNormal:
                mostrarNormal();
                break;
            case R.id.btnTipServMedio:
                mostrarMedio();
                break;
        }
    }

    private void mostrarMedio() {
    }

    private void mostrarNormal() {
        startActivity(new Intent(this,RegistroNumberPhoneActivity.class));
    }
}
