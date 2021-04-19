<template>
  <div class="row justify-content-center">
    <div class="col-12">
      <div class="card card-cascade narrower">
        <!-- card-depaso card-outline -->
        <div class="view view-cascade gradient-card-header blue-gradient">
          <div>
            <a class="card-title btn btn-app" @click="openModal()">
              <i class="fas fa-edit"></i> Registrar
            </a>
          </div>

          <div
            class="input-group input-group-sm"
            style="float: right; width: 200px; margin: 10px 10px 0px 0px"
          >
            <i style="margin: 7px 5px 0px 0px" class="fas fa-search"></i>
            <input
              type="text"
              name="table_search"
              class="form-control float-right"
              placeholder="Buscar"
              @keyup="((paginaActual = 1), (buscando = 1)), listar()"
            />
          </div>
        </div>
        <div class="card-body">
          <div class="card-body table-responsive p-0">
            <table class="table table-striped table-sm text-nowrap">
              <thead style="padding-bottom: 20px">
                <tr>
                  <th class="th-lg">
                    <a
                      >Opciones
                      <i class="fas fa-sort ml-1"></i>
                    </a>
                  </th>
                  <th class="th-lg">
                    <a
                      >Nombre
                      <i class="fas fa-sort ml-1"></i>
                    </a>
                  </th>
                  <th class="th-lg">
                    <a
                      >Descripcion
                      <i class="fas fa-sort ml-1"></i>
                    </a>
                  </th>
                  <th class="th-lg">
                    <a
                      >Estado
                      <i class="fas fa-sort ml-1"></i>
                    </a>
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="(categoria, index) in categorias" :key="index">
                  <td>
                    <button
                      type="button"
                      v-tooltip="'Editar'"
                      class="btn btn-outline-success btn-sm"
                      @click="alert('Editar' + categoria.id)"
                    >
                      <i class="fas fa-pencil-alt"></i>
                    </button>
                    <button
                      type="button"
                      v-tooltip="'Ver'"
                      class="btn btn-outline-warning btn-sm"
                      @click="alert('Ver' + categoria.id)"
                    >
                      <i class="far fa-eye"></i>
                    </button>
                    <button
                      type="button"
                      v-tooltip="'Eliminar'"
                      class="btn btn-outline-danger btn-sm"
                      @click="alert('Activar' + categoria.id)"
                    >
                      <i class="far fa-trash-alt"></i>
                    </button>
                  </td>

                  <td>{{ categoria.nombre }}</td>

                  <td>{{ categoria.descripcion }}</td>

                  <td>
                    <toggle-button
                      :value="true"
                      name="phone"
                      :labels="{
                        checked: 'ACTIVADO',
                        unchecked: 'DESACTIVADO',
                      }"
                      :color="{ checked: '#28a745', unchecked: '#dc3545' }"
                      :width="95"
                    />
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <!-- /.card-body -->
        <div class="card-footer clearfix">
          <ul class="float-left">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <label class="input-group-text" for="inputGroupSelect01"
                  >Registros</label
                >
              </div>
              <select
                class="form-control"
                @change="cambiarCantidadPaginas(tamañoPorPagina)"
                v-model="tamañoPorPagina"
              >
                <option v-for="option in tamañosPorPagina" :key="option">
                  {{ option }}
                </option>
              </select>
            </div>
          </ul>

          <paginate
            v-model="paginaActual"
            :page-count="totalPaginas"
            :margin-pages="1"
            :click-handler="cambiarPagina"
            :prev-text="'Prev'"
            :next-text="'Next'"
            :container-class="'pagination pagination-sm m-0 float-right'"
            :page-class="'page-item'"
            :page-link-class="'page-link'"
            :prev-class="'page-item'"
            :prev-link-class="'page-link'"
            :next-class="'page-item'"
            :next-link-class="'page-link'"
          >
            <span slot="prevContent">Changed previous button</span>
            <span slot="nextContent">Changed next button</span>
            <span slot="breakViewContent">
              <svg width="16" height="4" viewBox="0 0 16 4">
                <circle fill="#999999" cx="2" cy="2" r="2" />
                <circle fill="#999999" cx="8" cy="2" r="2" />
                <circle fill="#999999" cx="14" cy="2" r="2" />
              </svg>
            </span>
          </paginate>
        </div>
      </div>
    </div>

    <div class="modal fade" id="modal-default">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header bg-depaso text-white">
            <h6 class="modal-title">
              <i class="fas fa-tags"></i> Ingresa Categoría
            </h6>
            <button
              type="button"
              class="close text-white"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <!-- <form>
                <div class="card-body">
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Categoría</label>
                    <div class="col-sm-10">
                      <input
                        type="text"
                        class="form-control form-control-sm"
                        placeholder="Categoría" 
                      />
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label"
                      >Descripción</label
                    >
                    <div class="col-sm-10">
                      <textarea
                        class="form-control form-control-sm"
                        cols="10"
                        rows="3"
                        placeholder="Ingresa descripción"
                      ></textarea>
                    </div>
                  </div>
                </div>           
              </form> -->
            <form class="form-horizontal">
              <div class="card-body">
                <div class="form-group row">
                  <label for="Categoría" class="col-sm-3 col-form-label"
                    >Categoría:</label
                  >
                  <div class="col-sm-9">
                    <input
                      type="text"
                      class="form-control form-control-sm"
                      placeholder="Categoría"
                    />
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-3 col-form-label"
                    >Descripción:</label
                  >
                  <div class="col-sm-9">
                    <textarea
                      class="form-control form-control-sm"
                      cols="30"
                      rows="5"
                      placeholder="Descripción"
                    ></textarea>
                  </div>
                </div>
                <hr class="p-2" />

                <div class="row">
                  <div class="col-6">
                    <button
                      type="submit"
                      class="btn btn-block btn-outline-success btn-sm"
                    >
                      Aceptar
                    </button>
                  </div>
                  <div class="col-6">
                    <button
                      type="button"
                      class="btn btn-block btn-outline-danger btn-sm"
                    >
                      Cancelar
                    </button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
  </div>
</template>
<script>
import Paginate from "vuejs-paginate";
Vue.component("paginate", Paginate);

export default {
  data() {
    return {
      // ** Variables de Paginación
      maxVisible: 3,
      paginaActual: 1,
      totalPaginas: 0,
      tamañoPorPagina: 6,
      tamañosPorPagina: [3, 6, 9],
      totalregistros: "",
      // Variables
      nombre: "",
      descripcion: "",
      categorias: [],

      // Variables CheckBox Vue
      label: "Activo",
      valorAD: true,
    };
  },
  methods: {
    /**
     _______________________________
    |  MÉTODO OBETENER PARAMETROS */
    obtenerParametros(paginaActual, tamañoPorPagina) {
      const parametros = {};

      if (paginaActual) {
        parametros.paginaActual = paginaActual - 1;
      }

      if (tamañoPorPagina) {
        parametros.tamañoPorPagina = tamañoPorPagina;
      }
      return parametros;
    },
    /**
     ___________________________
    |  MÉTODO CAMBIAR PAGINAS */
    cambiarPagina(numeroPagina) {
      console.log(numeroPagina);
      const me = this;
      // me.buscando = 0;
      me.paginaActual = numeroPagina;
      me.listar();
      // me.ListarCategoriaPaginacion();
    },
    /**
     _________________________________
    |  MÉTODO REGISTROS POR PAGINA  */
    cambiarCantidadPaginas(tamaño) {
      const me = this;
      // me.buscando = 0;
      me.tamañoPorPagina = tamaño;
      me.paginaActual = 1;
      me.listar();
    },
    async listar() {
      const me = this;
      const patrametosListar = me.obtenerParametros(
        me.paginaActual,
        me.tamañoPorPagina
      );
      try {
        const response = await axios.get("/categoria/listpage", {
          params: patrametosListar,
        });
        const { filas, totalPaginas, totalFilas } = response.data;
        me.categorias = filas;
        me.totalPaginas = totalPaginas;
        me.totalregistros = totalFilas;
        console.log(response);
      } catch (error) {
        console.log(error);
      }
    },
    listarCategoria() {
      let me = this;
      axios
        .get("/categoria")
        .then(function (response) {
          me.categorias = response.data;

          // console.log(response);
        })
        .catch(function (error) {
          console.log(error);
        });
    },
    openModal() {
      $("#modal-default").modal("show");
    },
    Activar_Desactivar() {
      alert("baby");
      this.label = "Inactivo";
      this.valorAD = false;
    },
  },
  mounted() {
    this.listar();
  },
};
</script>
<style>
.select2-selection--single {
  height: 100% !important;
}
.select2-selection__rendered {
  word-wrap: break-word !important;
  text-overflow: inherit !important;
  white-space: normal !important;
}
/* MATERIAL DESIGN TABLE */
.card.card-cascade.narrower {
  margin-top: 1.25rem;
}
.card.card-cascade.narrower .view.view-cascade {
  /* margin-top: -1.25rem; */
  margin-right: 4%;
  margin-left: 4%;
}
.blue-gradient {
  background: linear-gradient(40deg, #e62073, #711da8) !important;
}
.card.card-cascade .view.view-cascade.gradient-card-header {
  /* padding: 0.8rem 1rem; */
  padding: 0.4rem 0.4rem 0.4rem 0.4rem;
  color: #fff;
  text-align: center;
  margin-top: -20px;
}

.card.card-cascade .view.view-cascade {
  border-radius: 0.25rem;
  border-top-left-radius: 0.25rem;
  border-top-right-radius: 0.25rem;
  border-bottom-right-radius: 0.25rem;
  border-bottom-left-radius: 0.25rem;
  -webkit-box-shadow: 0 5px 11px 0 rgb(0 0 0 / 18%),
    0 4px 15px 0 rgb(0 0 0 / 15%);
  box-shadow: 0 5px 11px 0 rgb(0 0 0 / 18%), 0 4px 15px 0 rgb(0 0 0 / 15%);
}

/* EDIT NEW COMPONENTS */
.btn-app {
  padding: 10px 5px;
  background-color: #f8f9fa00;
  margin: 0 0 0 0;
  min-width: 70px;
  height: 50px;
}
.btn-app:hover {
  background: #00000029;
  border-color: #aaaaaa;
  color: #444;
}

.page-item.active .page-link {
  z-index: 3;
  color: #ffffff;
  background-color: #f012be;
  border-color: #e83e8c;
}
</style>
