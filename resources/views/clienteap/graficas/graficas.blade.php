@extends ('layouts.admin')
@section ('contenido')
<div class="row">
      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-red">
          <div class="inner">
            <p>Aparatos a reparar para hoy : </p>
            <h3>{{$aparatos}}</h3>
          </div>
          <div class="icon">
            <i class="ion ion-ios-gear"></i>
          </div>
          <a href="{{url('clienteap/cliente_aparato')}}" class="small-box-footer">
            Más info <i class="fa fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>

      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-green">
          <div class="inner">
          <p>Aparatos a reparar en los proximos 6 dias:</p>  
          <h3>{{$areparar}}</h3>
          </div>
          <div class="icon">
            <i class="ion ion-ios-monitor"></i>
          </div>
          <a href="{{url('clienteap/cliente_aparato')}}" class="small-box-footer">
            Más info <i class="fa fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>
      @if((($email=Auth::user()->email)=="fernandogutierres801@gmail.com") || (($email=Auth::user()->email)=="jorgegutierrezhernandez1@gmail.com") || (($email=Auth::user()->email)=="electronicatriplej@gmail.com"))
      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-aqua">
              <div class="inner">
              <p>Suma de cobros en el mes actual:</p>
                  <h3>
                  {{$cobrosdelmes}} Lps
                  </h3>
              </div>
              <div class="icon">
                  <i class="ion ion-social-usd"></i>
              </div>
                  <a href="{{url('clienteap/cliente_aparato')}}" class="small-box-footer">
                  Más info <i class="fa fa-arrow-circle-right"></i>
                  </a>
            </div>
      </div>        
     @endif 
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-orange">
                <div class="inner">
                    <p>Piezas a conseguir:</p>
                    <h3>{{$papedir}}</h3>
                </div>
                <div class="icon">
                    <i class="ion ion-ios-cart"></i>
                </div>
                    <a href="{{url('pedir/papedir')}}" class="small-box-footer">
                    Más info <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
        </div>
</div>
   <div class="row">
      <div class="col-xs-12">
          <div class="box box-primary">	
              <div class="box-header with-border">
                   <h3 class="box-title">Gráfica de aparatos Recibidos, Reparados-Entregados</h3> 
              </div>
              <div class="box-body">
              <a href="" data-target="#modal-grafica1" data-toggle="modal"><button class="btn btn-success"><i class="fa fa-search"></i></button></a>
              @include('clienteap/graficas/modal')	
                <div class="chart-responsive">
                   <div class="chart" id="bar-chart2" style="height: 300px;"></div>
                </div>
              </div>
          </div>
      </div>

      <div class="col-md-6 col-xs-12">
                      <!--=====================================
              grafica de aparatos en huesera
              ======================================-->
              <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Aparatos en Huesera</h3>
                  </div>
                <div class="box-body">
                      <div class="row">
                        <div class="col-md-7">
                      <div class="chart-responsive">
                              <canvas id="pieChart" height="150"></canvas>
                            </div>
                        </div>
                      <div class="col-md-5">
                        <ul class="chart-legend clearfix">
                        @for ($i = 0; $i < count($tipoap); $i++)
                        <li><i class="fa fa-circle-o text-{{$colores[$i]}}"></i>{{$tipoap[$i].": ".$cantidadtipos[$i]}} </li>
                        @endfor
                        </ul>
                      </div>
                  </div>
                  </div>
              </div>
      </div>
      @if((($email=Auth::user()->email)=="fernandogutierres801@gmail.com") || (($email=Auth::user()->email)=="jorgegutierrezhernandez1@gmail.com") || (($email=Auth::user()->email)=="electronicatriplej@gmail.com"))
      <div class="col-xs-12">
                  <!--=====================================
            GRÁFICO DE cobros del año
            ======================================-->
            <div class="box box-solid bg-teal-gradient">
               <div class="box-header">
                   <i class="fa fa-th"></i>
                     <h3 class="box-title">Gráfico de Cobros</h3>
              </div>
              <div class="box-body border-radius-none">
              <a href="" data-target="#modal-grafica2" data-toggle="modal"><button class="btn btn-success"><i class="fa fa-search"></i></button></a>
              @include('clienteap/graficas/modal2')
                  <div class="chart" id="line-chart-cobros" style="height: 250px;"></div>
              </div>
            </div>
      </div>
      @endif

  </div>
@push('scripts') 
<script>
  // -------------
  // - PIE CHART -
  // -------------
  // Get context with jQuery - using jQuery's .get() method.
  window.onload = function(){
      var pieChartCanvas = $('#pieChart').get(0).getContext('2d');
      var pieChart       = new Chart(pieChartCanvas);
      var PieData        = [
        @for ($i = 0; $i < count($tipoap); $i++)
        {
          value    : "{{$cantidadtipos[$i]}}",
          color    : '{{$colores[$i]}}',
          highlight: '{{$colores[$i]}}',
          label    : '{{$tipoap[$i]}}'
        },
      @endfor
      ];
      var pieOptions     = {
        // Boolean - Whether we should show a stroke on each segment
        segmentShowStroke    : true,
        // String - The colour of each segment stroke
        segmentStrokeColor   : '#fff',
        // Number - The width of each segment stroke
        segmentStrokeWidth   : 1,
        // Number - The percentage of the chart that we cut out of the middle
        percentageInnerCutout: 50, // This is 0 for Pie charts
        // Number - Amount of animation steps
        animationSteps       : 100,
        // String - Animation easing effect
        animationEasing      : 'easeOutBounce',
        // Boolean - Whether we animate the rotation of the Doughnut
        animateRotate        : true,
        // Boolean - Whether we animate scaling the Doughnut from the centre
        animateScale         : false,
        // Boolean - whether to make the chart responsive to window resizing
        responsive           : true,
        // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
        maintainAspectRatio  : false,
        // String - A legend template
        legendTemplate       : '<ul class=\'<%=name.toLowerCase()%>-legend\'><% for (var i=0; i<segments.length; i++){%><li><span style=\'background-color:<%=segments[i].fillColor%>\'></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>',
        // String - A tooltip template
        tooltipTemplate      : '<%=value %> <%=label%>'
      };
      // Create pie or douhnut chart
      // You can switch between pie and douhnut using the method below.
      pieChart.Doughnut(PieData, pieOptions);

      //aqui empieza el scrip para el de barras 
              var bar = new Morris.Bar({
            element: 'bar-chart2',
            resize: true,
            data: [
              @for ($i = 0; $i < count($cantrecibidos); $i++)
              { x: "{{$meses[$i]}}" , y:'{{$cantrecibidos[$i]}}', z:'{{$cantreparados[$i]}}'}, 
             @endfor  
          ],
          xkey: 'x',
          ykeys: ['y', 'z'],
          labels: ['recibidos', 'reparados']
	      });
        //aqui empieza el de cobros en la parte de x tiene que ser numero;
        var line = new Morris.Line({
    element          : 'line-chart-cobros',
    resize           : true,
    data             : [
      @for ($i = 0; $i < count($cobrosaño); $i++)
              { x: '{{$mesgraf[$i]}}', y: '{{$cobrosaño[$i]}}' }, 
             @endfor 
    ],
    xkey: 'x',
    ykeys            : ['y'],
    labels           : ['cobros'],
    lineColors       : ['#efefef'],
    lineWidth        : 2,
    hideHover        : 'auto',
    gridTextColor    : '#fff',
    gridStrokeWidth  : 0.4,
    pointSize        : 4,
    pointStrokeColors: ['#efefef'],
    gridLineColor    : '#efefef',
    gridTextFamily   : 'Open Sans',
    preUnits         : 'Lps: ',
    gridTextSize     : 10
  });
      
    }//fin del onload
      // -----------------
      // - END PIE CHART -
      // -----------------


</script>
@endpush
@endsection
