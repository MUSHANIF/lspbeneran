<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
<table class="table mt-3" cellpadding="10" cellspace="0">
  
   
    <thead class="align-self-center text-center">
        <tr>
            <th colspan="13" class="text-center"><h2 style="align-content: center">Data transaksi</h2></th>
        </tr>
        <tr>

        <th colspan="3">Nama pembeli</th>
         <th colspan="3">Nama layanan</th>
         <th colspan="3" >Metode pembayaran</th>
         <th colspan="2" >Jumlah</th>
         <th colspan="2">Total bayar</th>
    </tr>
        
    </thead>
   
    @foreach ($datas as $key) 
    <tbody>
        <tr class="align-self-center text-center"  style="border: 1px solid black;">
            <th colspan="3">{{ $key->transaksiuser->name }}</th>
            <td colspan="3">            
                    @foreach ($data as $i )
                     @if ($key->transaksi->layananid === $i->id)
                     {{ $i->name }}
                    @endif
                    @endforeach                                       
            </td>
            <td colspan="3">{{ $key->metode_pembayaran }}</td>
            <td colspan="2">{{ $key->jumlah }}</td>
            <td colspan="2">Rp. {{number_format($key->bayar, 0, '', '.') }}</td>
 
            
        
        </tr>
    </tbody>
    @endforeach
   

</table>
</body>
</html>