<?php
include 'conexion.php'; // tu archivo de conexión a MySQL

$query = "SELECT * FROM carrusel ";
$resultado = mysqli_query($conexion, $query);
?>

<div class="swiper mySwiper">
  <div class="swiper-wrapper">
    <?php while ($slide = mysqli_fetch_assoc($resultado)): ?>
      <div class="swiper-slide">
        <img src="<?php echo htmlspecialchars($slide['imagen']); ?>" alt="<?php echo htmlspecialchars($slide['titulo']); ?>" />
        <div class="carrusel-overlay">
          <h1><?php echo htmlspecialchars($slide['titulo']); ?></h1>
          <p><?php echo htmlspecialchars($slide['descripcion']); ?></p>
          <?php if (!empty($slide['boton_texto'])): ?>
            <a href="<?php echo htmlspecialchars($slide['boton_url']); ?>" class="boton">
              <?php echo htmlspecialchars($slide['boton_texto']); ?>
            </a>
          <?php endif; ?>
        </div>
      </div>
    <?php endwhile; ?>
  </div>

  <!-- Navegación -->
  <div class="swiper-button-prev"></div>
  <div class="swiper-button-next"></div>
  <div class="swiper-pagination"></div>
</div>