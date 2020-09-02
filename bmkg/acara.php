<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>.slideshow {
	display: none;
}
	</style>
</head>
<body>
<h1></h1>
<div style="max-width:277px">

	  <!-- edit prihandono here -->

	
        <img class="slideshow" src="https://scontent-sin6-1.xx.fbcdn.net/v/t1.0-9/p960x960/93102204_740726963125440_7769001303321083904_o.jpg?_nc_cat=100&_nc_sid=110474&_nc_ohc=arDwUkO6BX4AX8z0bqz&_nc_ht=scontent-sin6-1.xx&_nc_tp=6&oh=848d95beccd555ce261de4b208d67362&oe=5EBFC61F" width="270px" height="270px">
        <img class="slideshow" src="https://scontent.fpku3-1.fna.fbcdn.net/v/t1.0-9/s960x960/89670616_717145635483573_8970416433263542272_o.jpg?_nc_cat=107&_nc_sid=110474&_nc_eui2=AeFczqURQj2MfVJC3q94yVI1JmFdt298AbomYV23b3wBuvhSwbzQiN6Fv3iN42R84hl8Oy3R2skg_3_mbCfLt12x&_nc_ohc=49Rvma7vgIgAX9BRI7G&_nc_ht=scontent.fpku3-1.fna&_nc_tp=7&oh=3401f4d490413258d531f563504b5980&oe=5EB66BE1" width="270px" height="270px"> 
        <img class="slideshow" src="https://scontent.fpku3-1.fna.fbcdn.net/v/t1.0-9/s960x960/89833216_717437302121073_1102688816948314112_o.jpg?_nc_cat=107&_nc_sid=110474&_nc_eui2=AeGNhatlJQqw0yLDxQiqOhMNeSSmQh1BERZ5JKZCHUERFrStb4eo6DaMwu5R8E5ge8NIAZMaCIlL5EdOJnsxEadr&_nc_ohc=VOrGmUZN6ewAX8WDMM-&_nc_ht=scontent.fpku3-1.fna&_nc_tp=7&oh=72fdad531e26220605b532af1ac213d5&oe=5EB8361C" width="270px" height="270px"> 
        <img class="slideshow" src="https://scontent.fpku2-1.fna.fbcdn.net/v/t1.0-9/p960x960/87792782_708516033013200_1418094091131944960_o.jpg?_nc_cat=104&_nc_sid=110474&_nc_eui2=AeHHODFp9EPRNyOggs_kzur-4Dhrb2rmyITgOGtvaubIhPjcpp7NJys96aQEXS--55Ira2ktL8l8C51ipm_JF3AJ&_nc_ohc=x4Xa3-3ZK2gAX90P1lt&_nc_ht=scontent.fpku2-1.fna&_nc_tp=6&oh=94d23462b460425cf8da1b8b00d3bc83&oe=5EB95EEB" width="270px" height="270px">
        <img class="slideshow" src="https://scontent.fpku2-1.fna.fbcdn.net/v/t1.0-9/p960x960/90045255_720433671821436_5847354079491129344_o.jpg?_nc_cat=104&_nc_sid=110474&_nc_eui2=AeFVjlv23P1qvpl9gkvNjjcYXcQCEr6w8HNdxAISvrDwcy5PVQ5uN7nkoq7vOftw2y_0OMIL6myPeAXVtOPMpbk6&_nc_ohc=oH2D8ooPKVEAX_RSUaE&_nc_ht=scontent.fpku2-1.fna&_nc_tp=6&oh=9aeb19afa808286dd68698cd46abc533&oe=5EB9008C" width="270px" height="270px">
        <img class="slideshow" src="https://scontent.fpku2-1.fna.fbcdn.net/v/t1.0-9/p960x960/90785126_725794734618663_7366402918808813568_o.jpg?_nc_cat=104&_nc_sid=110474&_nc_eui2=AeF7IumTX3vrUG6tN3RexjRBXlhCiSiPKJJeWEKJKI8okpz7bp1ovjLEuxM5Yoks-IMbX0xE5XO03CbRhyClEMly&_nc_ohc=4SW1yA_7b9AAX9VHQyl&_nc_ht=scontent.fpku2-1.fna&_nc_tp=6&oh=04301d6f0615131f30e6087525e48d2b&oe=5EB631DB" width="270px" height="270px">  
        
</div>
	<script>
var myIndex = 0;
carousel();
 
function carousel() {
	var i;
	var x = document.getElementsByClassName("slideshow");
	for (i = 0; i < x.length; i++) {
		x[i].style.display = "none";  
	}
 
	myIndex++;
	if (myIndex > x.length) {myIndex = 1}    
	x[myIndex-1].style.display = "block";  
	setTimeout(carousel, 3000); //Ubah gambar setiap 3 detik
	}
	</script>
</body>
</html>