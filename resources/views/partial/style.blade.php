<style>
@keyframes fadeOut {
  0%, 10% {
    opacity: 1.7;
  }
  90%, 100% {
    opacity: 0;
    display: none;
  }
}

/* @keyframes slideLeft {
  0%, 10% {
    opacity: 1;
    transform: translateX(0);
  }
  90%, 100% {
    opacity: 0;
    transform: translateX(100%); 
    display: none;
  }
} */
/* Style the dropdown image */
.dropbtn {
  width: 30px; /* Sesuaikan ukuran gambar sesuai kebutuhan Anda */
  height: 30px; /* Sesuaikan ukuran gambar sesuai kebutuhan Anda */
  cursor: pointer;
}

/* Style the dropdown content (sama seperti sebelumnya) */
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

/* Style the dropdown links (sama seperti sebelumnya) */
/* Style the dropdown image */
.dropbtn {
    width: 35px;
    height: 30px;
    border-radius: 100%;
    cursor: pointer;
}

/* Style the dropdown content */
.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
    z-index: 1;
}

/* Style the dropdown links */
.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

/* Change color on hover */
.dropdown-content a:hover {
    background-color: #f1f1f1;
}

/* Show the dropdown when hovering over the image */
.dropdown:hover .dropdown-content {
    display: block;
}

</style>
<script>
    const alertElement = document.querySelector(".alert");
  
    alertElement.addEventListener("animationend", function () {
      alertElement.style.display = "none";
    });
    const modalTrigger = document.getElementById('tmodal');
const modal = document.getElementById('myModal');
const closeModal = document.getElementById('closeModal');

modalTrigger.addEventListener('click', () => {
  modal.style.display = 'block';
});

closeModal.addEventListener('click', () => {
  modal.style.display = 'none';
});

window.addEventListener('click', (event) => {
  if (event.target == modal) {
    modal.style.display = 'none';
  }
});
  </script>