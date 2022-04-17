
@extends('layouts.app')

@section('title','Welcome')

@section('content')

    <body> 
        <div style="background-image: url(https://static.vecteezy.com/system/resources/previews/004/511/333/large_2x/abstract-technological-background-business-futuristic-innovation-background-vector.jpg);
        width: 100%;
        height: 558px;
        background-size:cover;
        background-position:center;"
        class="d-flex justify-content-around">
            <div style="float: left;  margin-top: 10%; ">
                <p style="font-family: 'Times New Roman'; text-align: center; font-size: 35px;">Sistema de Gestion de Aulas <br>UMSS </p>

                <p style="font-family: 'Times New Roman'; text-align: center; font-size: 25px;">Realiza tu reserva de aula cuando <br>quieras y donde quieras</p>
            </div>
            <div style="float: left; padding-top: 12%" >
                <img src="{{asset('images/imagen1.jpg')}}" alt="" style="border-radius: 10px; position: relative; width:100%; max-width:400px;">
            </div>
            
        </div >

        <div class="d-flex justify-content-sm-between" style="background-color: #1D3354;">
            <div style="padding-left: 2%; padding-top: 1%;">
                <p style="font-family: 'Times New Roman'; text-align:initial; color:white; ">
                    Facultad de Ciencias y Tecnologia (UMSS) <br> Cochabamba-Bolivia </p>
            </div>

            <div style="padding-top:1%">
                <img src="{{asset('images/egenius.png')}}" width="40" height="60"  alt="">

            </div>
              
            <div style="padding-right: 2%; padding-top: 0.3%;">
                <p style="font-family: 'Times New Roman'; text-align:initial; color:white; ">
                    Calle Sucre y parque de la Torre <br> Evil Genius S.R.L. <br> Contactenos: 77928248</p>

            </div>
        </div>
        
        
    </body>
@endsection
