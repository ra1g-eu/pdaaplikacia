<div class="jumbotron">
  <h2 class="display-3">Počet študentov na praxi</h2>
<div id="graph"></div>
</div>    

    <script>
        Morris.Bar({
          element: 'graph',
          data: <?php echo $data;?>,
          xkey: 'NazovFirmy',
          ykeys: ['PocetStudentov'],
          labels: ['Počet študentov na praxi']
        });
        </script>

        <div class="jumbotron">
        <h2 class="display-3">Počet študentov s danou praxou</h2>
		<div id="graph2"></div>
		</div>

    	<script>
        Morris.Bar({
          element: 'graph2',
          data: <?php echo $spnpdata;?>,
          xkey: 'Praca',
          ykeys: ['PocetStudentov2'],
          labels: ['Počet študentov']
        });
        </script>
        