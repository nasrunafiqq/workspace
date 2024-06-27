<!doctype html>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content=
		"width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible"
		content="ie=edge">
	<script src="https://cdn.tailwindcss.com"></script>
	<title>Geeksforgeeks Image Gallery</title>
</head>

<body>
	<h1 class="mt-10 mb-5 text-center text-3xl text-green-600">
	Geeksforgeeks Image Gallery
	</h1>
	<h3 class="mb-10 text-center text-xl text-green-600">
	Click the image to view
	</h3>

	<!-- Image grid -->
	<div class="p-10 grid grid-cols-3 gap-5 ">
		<img class="w-full h-full object-cover cursor-pointer" src=
"https://media.geeksforgeeks.org/wp-content/uploads/20240215121528/javare15.png"
			alt="Img 1" id="img1" />

		<img class="w-full h-full object-cover cursor-pointer" src=
"https://media.geeksforgeeks.org/wp-content/uploads/20240215121204/15re.webp"
			alt="Img 2" id="img2" />

		<img class="w-full h-full object-cover cursor-pointer" src=
"https://media.geeksforgeeks.org/wp-content/uploads/20240215121356/jsre15.jpg"
			alt="Img 3" id="img3" />
	</div>

	<!-- The Modal -->
	<div id="modal"
		class="hidden fixed top-0 left-0 z-80 
				w-screen h-screen bg-black/70 flex 
				justify-center items-center">

		<!-- The close button -->
		<a class="fixed z-90 top-6 right-8 
				text-white text-5xl font-bold" 
		href="javascript:void(0)"
		onclick="closeModal()">
			×
		</a>

		<!-- A big image will be displayed here -->
		<img id="modal-img"
			class="max-w-[800px] max-h-[600px] object-cover"/>
	</div>

	<script>
		
		// Get all the img elements in the grid
		var images = document.querySelectorAll('.grid div img');

		// Loop through each img element
		images.forEach(function (img) {
			
		// Add a click event listener to each img element
			img.addEventListener('click', function () {
				showModal(img.src);
			});
		});

		// Get the modal by id
		var modal = document.getElementById("modal");

		// Get the modal image tag
		var modalImg = document.getElementById("modal-img");

		// This function is called when a small image is clicked
		function showModal(src) {
			modal.classList.remove('hidden');
			modalImg.src = src;
		}

		// This function is called when the close button is clicked
		function closeModal() {
			modal.classList.add('hidden');
		}
	</script>
</body>

</html>
