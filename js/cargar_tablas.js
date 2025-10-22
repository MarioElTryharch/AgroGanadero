// =============================================
// CARGAR DATOS DE TABLAS - RUTAS CON API/
// =============================================

// Función para cargar vientres
async function cargarVientres() {
  try {
    console.log("🔄 Cargando datos de vientres...");

    const response = await fetch("api/vientres.php");

    if (!response.ok) {
      throw new Error(`Error HTTP: ${response.status}`);
    }

    const data = await response.json();

    if (data.success) {
      console.log(`✅ Vientres cargados: ${data.data.length} registros`);
      return data.data;
    } else {
      console.warn("⚠️ Respuesta de vientres no exitosa:", data.message);
      return [];
    }
  } catch (error) {
    console.error("❌ Error cargando vientres:", error);
    return [];
  }
}

// Función para cargar crías
async function cargarCrias() {
  try {
    const response = await fetch("api/animales-cria.php");
    const data = await response.json();

    if (data.success) {
      console.log(`✅ Crías cargadas: ${data.data.length} registros`);
      return data.data;
    } else {
      console.warn("⚠️ Respuesta de crías no exitosa:", data.message);
      return [];
    }
  } catch (error) {
    console.error("❌ Error cargando crías:", error);
    return [];
  }
}

// Función para cargar eliminados
async function cargarEliminados() {
  try {
    const response = await fetch("api/animales-elim.php");
    const data = await response.json();

    if (data.success) {
      console.log(`✅ Eliminados cargados: ${data.data.length} registros`);
      return data.data;
    } else {
      console.warn("⚠️ Respuesta de eliminados no exitosa:", data.message);
      return [];
    }
  } catch (error) {
    console.error("❌ Error cargando eliminados:", error);
    return [];
  }
}

// Función para cargar toros
async function cargarToros() {
  try {
    const response = await fetch("api/toros.php");
    const data = await response.json();

    if (data.success) {
      console.log(`✅ Toros cargados: ${data.data.length} registros`);
      return data.data;
    } else {
      console.warn("⚠️ Respuesta de toros no exitosa:", data.message);
      return [];
    }
  } catch (error) {
    console.error("❌ Error cargando toros:", error);
    return [];
  }
}

// Función para cargar inseminadores
async function cargarInseminadores() {
  try {
    const response = await fetch("api/inseminadores.php");
    const data = await response.json();

    if (data.success) {
      console.log(`✅ Inseminadores cargados: ${data.data.length} registros`);
      return data.data;
    } else {
      console.warn("⚠️ Respuesta de inseminadores no exitosa:", data.message);
      return [];
    }
  } catch (error) {
    console.error("❌ Error cargando inseminadores:", error);
    return [];
  }
}

// =============================================
// ACTUALIZAR CONTADORES
// =============================================

async function actualizarTodosLosContadores() {
  console.log("🔄 Actualizando todos los contadores...");

  try {
    // Vientres
    const vientresData = await cargarVientres();
    actualizarContador("vientres-count", vientresData.length);

    // Crías
    const criasData = await cargarCrias();
    actualizarContador("crias-count", criasData.length);

    // Eliminados
    const eliminadosData = await cargarEliminados();
    actualizarContador("eliminados-count", eliminadosData.length);

    // Toros
    const torosData = await cargarToros();
    actualizarContador("toros-count", torosData.length);

    // Inseminadores
    const inseminadoresData = await cargarInseminadores();
    actualizarContador("inseminadores-count", inseminadoresData.length);

    console.log("✅ Todos los contadores actualizados");
  } catch (error) {
    console.error("❌ Error actualizando contadores:", error);
  }
}

// Función auxiliar para actualizar contadores
function actualizarContador(elementId, count) {
  const elemento = document.getElementById(elementId);
  if (elemento) {
    elemento.textContent = count;
  } else {
    console.warn(`⚠️ Elemento no encontrado: ${elementId}`);
  }
}

// =============================================
// INICIALIZACIÓN
// =============================================

document.addEventListener("DOMContentLoaded", function () {
  console.log("🚀 Inicializando carga de tablas...");

  // Solo cargar contadores si estamos en la página de vacuno
  if (
    document.querySelector(".vacuno-container") ||
    window.location.href.includes("agro-vacuno")
  ) {
    setTimeout(() => {
      actualizarTodosLosContadores();
    }, 1000);
  }
});
