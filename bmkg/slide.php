<html>
<head>
<title></title>
<style type="text/css">
#content-slider {
   position: relative;
   width: 270px;
   height: 270px;
   overflow: hidden;
}
#content-slider img {
   display: block;
   width: 270px;
   height: 270px;
}
</style>
<script type="text/javascript" src="jquery.min.js"></script>
<script type="text/javascript" src="jquery.cycle.all.latest.js"></script>
<script type="text/javascript">
$(document).ready(function() {
   $('#content-slider').cycle({
   fx: 'fade',
   speed: 3000, // millisecond
   timeout: 2000, // millisecond
   pause: 1

});
</script>
</head>
<body>
<div id="content-slider">
   <img src="https://scontent.fpku2-1.fna.fbcdn.net/v/t1.0-9/p960x960/90106626_721010168430453_8334839158392487936_o.jpg?_nc_cat=110&_nc_sid=110474&_nc_eui2=AeGj0Er9ODLhTvebyHctijabsoh_HWOhKuuyiH8dY6Eq6y5ltfMCzT77OMMsFiO86uFDhPW5GTGbk7mm64T4Zozf&_nc_ohc=2q1euObUfG4AX_BeS1A&_nc_ht=scontent.fpku2-1.fna&_nc_tp=6&oh=4ebe6457a2703e6c1e3018e8e3c2aaba&oe=5EB86AE2" alt="Slideshow 1" />
   <img src="https://scontent.fpku2-1.fna.fbcdn.net/v/t1.0-9/p960x960/87792782_708516033013200_1418094091131944960_o.jpg?_nc_cat=104&_nc_sid=110474&_nc_eui2=AeHHODFp9EPRNyOggs_kzur-4Dhrb2rmyITgOGtvaubIhPjcpp7NJys96aQEXS--55Ira2ktL8l8C51ipm_JF3AJ&_nc_ohc=x4Xa3-3ZK2gAX90P1lt&_nc_ht=scontent.fpku2-1.fna&_nc_tp=6&oh=94d23462b460425cf8da1b8b00d3bc83&oe=5EB95EEB" alt="Slideshow 2" />
   <img src="https://scontent.fpku3-1.fna.fbcdn.net/v/t1.0-9/s960x960/89833216_717437302121073_1102688816948314112_o.jpg?_nc_cat=107&_nc_sid=110474&_nc_eui2=AeGNhatlJQqw0yLDxQiqOhMNeSSmQh1BERZ5JKZCHUERFrStb4eo6DaMwu5R8E5ge8NIAZMaCIlL5EdOJnsxEadr&_nc_ohc=VOrGmUZN6ewAX8WDMM-&_nc_ht=scontent.fpku3-1.fna&_nc_tp=7&oh=72fdad531e26220605b532af1ac213d5&oe=5EB8361C" alt="Slideshow 3" />
</div>
</body>
</html>