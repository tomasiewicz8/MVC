// Función para realizar la búsqueda de productos en el backend
function searchProduct() {
  var productName = document.getElementById('product').value;
  searchProductInBackend(productName);
}

// Función para obtener todos los productos desde el backend
function getAllProductsFromBackend() {
  fetch('/backend/controller/ProductoController.php')
      .then((response) => response.json())
      .then((data) => {
          console.log(data);
          displayProducts(data);
      })
      .catch((error) => {
          console.error('Error:', error);
      });
}

// Función para realizar la búsqueda de productos en el backend
function searchProductInBackend(productName) {
  fetch('/backend/controller/ProductoController.php', {
      method: 'POST',
      headers: {
          'Content-Type': 'application/x-www-form-urlencoded',
      },
      body: 'product=' + encodeURIComponent(productName),
  })
  .then((response) => response.json())
  .then((data) => {
      console.log(data);
      displayProducts(data);
  })
  .catch((error) => {
      console.error('Error:', error);
  });
}

// Función para mostrar los productos en la interfaz de usuario
function displayProducts(products) {
  var productListContainer = document.getElementById('productList');
  productListContainer.innerHTML = '';

  if (products.length > 0) {
      products.forEach((product) => {
          var productElement = document.createElement('div');
          let nameFinal = product.name;
          if (product.name.length <= 27) {
              nameFinal += '<br><br>';
          }
          productElement.innerHTML = `
              <h2> ${nameFinal}</h2>
              <p class="price">Price: ${product.price}</p>
              <p>Description: ${product.description}</p>
              <div class="image"><img src='${product.image}' alt='${product.name}'/></div>
          `;
          productListContainer.appendChild(productElement);
      });
  } else {
      productListContainer.innerHTML = '<p>No se encontraron resultados.</p>';
  }
}

// Llama a la función para obtener todos los productos cuando la página cargue
window.onload = function () {
  getAllProductsFromBackend();

  // Agrega un evento al formulario para manejar la búsqueda de productos
  var productForm = document.getElementById('productForm');
  productForm.addEventListener('submit', function (event) {
      event.preventDefault(); // Evita el envío del formulario tradicional
      var productName = document.getElementById('product').value;
      searchProductInBackend(productName);
  });
};
