<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/8.4.1/firebase-app.js"></script>

<!-- Firestore -->
<script src="https://www.gstatic.com/firebasejs/8.4.1/firebase-firestore.js"></script>

<!-- TODO: Add SDKs for Firebase products that you want to use https://firebase.google.com/docs/web/setup#available-libraries -->
<script src="https://www.gstatic.com/firebasejs/8.4.1/firebase-analytics.js"></script>
<!--Auth-->
<script src="https://www.gstatic.com/firebasejs/8.4.1/firebase-auth.js"></script>

<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>

<script>
	// Your web app's Firebase configuration
	// For Firebase JS SDK v7.20.0 and later, measurementId is optional
	var firebaseConfig = {
		apiKey: "AIzaSyDi2lrWOB_hE5SXUj0xIhQ-NPeB_tfWb6c",
		authDomain: "qlbenhnhan-3c699.firebaseapp.com",
		projectId: "qlbenhnhan-3c699",
		storageBucket: "qlbenhnhan-3c699.appspot.com",
		messagingSenderId: "205187167987",
		appId: "1:205187167987:web:47bfa19f051970363c2986",
		measurementId: "G-NNTNCLQ63L"
	};
	// Initialize Firebase
	firebase.initializeApp(firebaseConfig);
	firebase.analytics();
	var db = firebase.firestore();
	
</script>