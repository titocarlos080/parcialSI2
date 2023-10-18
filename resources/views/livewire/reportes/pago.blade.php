 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
 </head>

 <body>
     <h3 style="text-align: center;"> RECIBO DE COMPRA</h3>
     <div style="display: block;width: 100%;">
         <section>
             <table cellpadding="0" cellspacing="0" width="100%">
                 <tr>
                     <td colspan="2" class="text-center">
                         <span style="font-size: 25px; font-weight: bold;">EMPRESA:</span>
                     </td>

                     <td colspan="2" class="text-left pl-0 ">
                         @php
                         $user= Auth::user();
                         $total=0;
                         @endphp
                         <h4>CLIENTE: {{$user->nombre}}</h4>
                         <p>Fecha: <?php echo date("d/m/Y"); ?></p>
                     </td>

                 </tr>

                 <tr>
                     <td width="30%" style="vertical-align: top; padding-top: 10px; position: relative;">
                         <img src="assets/images/logo_empresa.png" alt="" height="100">
                     </td>

                 </tr>
             </table>
         </section>
         <div style="display: flex;  justify-content: center;margin-top: 50px; ">
             <div style="width: 100%;  margin-left:80px;">
                 <table class="table" style=" border: 2px solid black;">

                     <thead style=" border-bottom: 1px solid black;padding: 0;margin: 0; align-items: center; ">
                         <tr>
                             <th>ITEM</th>
                             <th style="border-left: 2px solid black;">PRODUCTO</th>
                             <th style="border-left: 2px solid black;">CANTIDAD</th>
                             <th style="border-left: 2px solid black;">PRECIO UNITARIO</th>
                             <th style="border-left: 2px solid black;">PRECIO_PARCIAL</th>


                         </tr>
                     </thead>

                     <tbody style="border-bottom: 1px solid black;padding: 0;margin: 0; align-items: center; ">
                         @php
                         $count=0;
                         @endphp
                         @foreach($detallepedido as $detalle)
                         @php
                         $count++;
                         @endphp
                         <tr>
                             <td style=" text-align: center;">{{ $count}} </td>
                             <td style=" border-left: 2px solid black;  text-align: center;">{{$detalle->id_producto}} </td>
                             <td style="border-left: 2px solid black;  text-align: center;">{{$detalle->cantidad}} </td>
                             <td style="border-left: 2px solid black; text-align: center;">{{$detalle->precio}} </td>
                             <td style="border-left: 2px solid black;  text-align: center;">{{$detalle->precio_parcial}} </td>
                             {{$total =$total+$detalle->precio_parcial }}
 
                         </tr>
                         @endforeach
                         <tr style="border-top: 1px solid black;padding: 0;margin: 0; align-items: center;">
                             <td>Estado </td>
                             <td> {{$estado}}</td>
                             <td> </td>
                             <td style="text-align: right;">
                                 <h3>TOTAL: </h3>
                             </td>
                             <td style="text-align: center;">
                                 <h3>
                                     {{$total}} Bs
                                 </h3>
                             </td>

                         </tr>
                     </tbody>
                 </table>

             </div>

         </div>
     </div>


     <div>
         <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Officiis exercitationem voluptatibus repellendus adipisci eveniet minima quo ipsa, nulla aspernatur natus eius doloremque quos provident incidunt quas veritatis saepe illo aut.</p>
     </div>

 </body>

 </html>