// Función para obtener todos los productos desde el backend
function getAllProductsFromBackend() {
  fetch('../backend/controller/ProductoController.php') // Ruta al controlador en el backend
    .then((response) => response.json()) // Convierte la respuesta a formato JSON
    .then((data) => {
      // La variable 'data' ahora contiene la lista de productos
      console.log(data)

      // Puedes manipular los datos como desees, por ejemplo, mostrarlos en la interfaz de usuario
      displayProducts(data)
    })
    .catch((error) => {
      console.error('Error:', error)
    })
}

// Función para mostrar los productos en la interfaz de usuario
function displayProducts(products) {
  var productListContainer = document.getElementById('productList')
  productListContainer.innerHTML = ''

  products.forEach((product) => {
    var productElement = document.createElement('div')
    productElement.innerHTML = `
            <p>ID: ${product.id}</p>
            <p>Name: ${product.name}</p>
            <p>Price: ${product.price}</p>
            <p>Description: ${product.description}</p>
            <div><img src='${product.image}' alt='${product.name}'/></div>
        `
    productListContainer.appendChild(productElement)
  })
}

// Llama a la función para obtener los productos cuando la página cargue
window.onload = function () {
  getAllProductsFromBackend()
}
