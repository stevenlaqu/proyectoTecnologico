package com.example.smartgarden;

import androidx.appcompat.app.AlertDialog;
import androidx.appcompat.app.AppCompatActivity;
import androidx.core.graphics.drawable.RoundedBitmapDrawable;
import androidx.core.graphics.drawable.RoundedBitmapDrawableFactory;
import androidx.viewpager.widget.ViewPager;

import android.content.res.Resources;
import android.graphics.Bitmap;
import android.graphics.BitmapFactory;
import android.graphics.BitmapShader;
import android.graphics.Paint;
import android.graphics.RectF;
import android.graphics.Shader;
import android.os.Bundle;
import android.util.Base64;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;
import android.widget.Toolbar;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.JsonObjectRequest;
import com.android.volley.toolbox.Volley;
import com.example.smartgarden.main.SectionsPagerAdapter;
import com.google.android.material.floatingactionbutton.FloatingActionButton;
import com.google.android.material.snackbar.Snackbar;
import com.google.android.material.tabs.TabLayout;

import org.json.JSONException;
import org.json.JSONObject;

public class HomeSmartGardenActivity extends AppCompatActivity {

    String uri_server;

    TextView lblUser;
    ImageView imageViewPortada,imageViewPerfil;
    TabLayout tabLayout;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_home_smart_garden);

        SectionsPagerAdapter sectionsPagerAdapter = new SectionsPagerAdapter(this, getSupportFragmentManager());
        ViewPager viewPager = findViewById(R.id.view_pager);
        viewPager.setAdapter(sectionsPagerAdapter);
        TabLayout tabs = findViewById(R.id.tabs);
        tabs.setupWithViewPager(viewPager);
        FloatingActionButton fab = findViewById(R.id.fab);

        fab.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Snackbar.make(view, "Replace with your own action", Snackbar.LENGTH_LONG)
                        .setAction("Action", null).show();
            }
        });


        imageViewPortada = findViewById(R.id.imgPortada);
        imageViewPerfil = findViewById(R.id.imgPerfil);
        lblUser =findViewById(R.id.lblUser);
        uri_server= getString(R.string.server_uri);
        getImgPortada();
        getImgPerfil();
        getDatosUsuario();

    }

    private void getDatosUsuario() {
        RequestQueue queue = Volley.newRequestQueue(this);
        String urlPortada= uri_server+"/GetDatosPerfil.php";

        JsonObjectRequest jor = new JsonObjectRequest(
                Request.Method.GET, urlPortada, null, new Response.Listener<JSONObject>() {
            @Override
            public void onResponse(JSONObject response) {
                mostrarDatos(response);
            }
        },new Response.ErrorListener(){
            @Override
            public void onErrorResponse(VolleyError error){
                mostrarDialogo(error.getMessage());
            }
        });
        queue.add(jor);
    }

    private void mostrarDatos(JSONObject response) {
        String img = null;
        try{
            img = response.getString("nombre") ;
        }catch (JSONException error){
            mostrarDialogo(error.getMessage());
        }

        lblUser.setText(img);
    }

    private void getImgPerfil() {
        RequestQueue queue = Volley.newRequestQueue(this);
        String urlPortada= uri_server+"/GetImagenPerfil.php";

        JsonObjectRequest jor = new JsonObjectRequest(
                Request.Method.GET, urlPortada, null, new Response.Listener<JSONObject>() {
            @Override
            public void onResponse(JSONObject response) {
                mostrarPerfil(response);
            }
        },new Response.ErrorListener(){
            @Override
            public void onErrorResponse(VolleyError error){
                mostrarDialogo(error.getMessage());
            }
        });
        queue.add(jor);
    }

    private void mostrarPerfil(JSONObject response) {
        String img = null;
        try{
            img = response.getString("img") ;
        }catch (JSONException error){
            mostrarDialogo(error.getMessage());
        }
        byte[] decodedString = Base64.decode(img, Base64.DEFAULT);
        Bitmap image = BitmapFactory.decodeByteArray(decodedString, 0, decodedString.length);

        Resources res = getResources();
        RoundedBitmapDrawable dr = RoundedBitmapDrawableFactory.create(res, image);
        dr.setCircular(false);
        int h = image.getHeight();
        int w = image.getWidth();

        dr.setCornerRadius(h/2.0f);
        imageViewPerfil.setImageDrawable(dr);
    }

    private void getImgPortada() {
        RequestQueue queue = Volley.newRequestQueue(this);
        String urlPortada= uri_server+"/GetImagenPortada.php";

        JsonObjectRequest jor = new JsonObjectRequest(
                Request.Method.GET, urlPortada, null, new Response.Listener<JSONObject>() {
            @Override
            public void onResponse(JSONObject response) {
                mostrarPortada(response);
            }
        },new Response.ErrorListener(){
            @Override
            public void onErrorResponse(VolleyError error){
                mostrarDialogo(error.getMessage());
            }
        });
        queue.add(jor);
    }

    private void mostrarPortada(JSONObject response) {
        String img = null;
        try{
            img = response.getString("img") ;
        }catch (JSONException error){
            mostrarDialogo(error.getMessage());
        }
        byte[] decodedString = Base64.decode(img, Base64.DEFAULT);
        Bitmap image = BitmapFactory.decodeByteArray(decodedString, 0, decodedString.length);

        Resources res = getResources();
        RoundedBitmapDrawable dr = RoundedBitmapDrawableFactory.create(res, image);
        dr.setCircular(false);
        int h = image.getHeight();
        int w = image.getWidth();

        dr.setCornerRadius(200);
        imageViewPortada.setImageDrawable(dr);
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
