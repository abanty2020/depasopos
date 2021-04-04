<template>
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card card-depaso card-outline">
        <div class="card-header">
          <div class="row">
            <div class="col-xl-3 col-md-6">
              <button
                @click="openModal()"
                type="button"
                class="btn btn-outline-secondary btn-block"
              >
                <i class="fas fa-save"></i> Registrar
              </button>
            </div>
            <div style="text-align: end" class="col-9">
              <div class="card-tools">
                <button
                  type="button"
                  class="btn btn-tool"
                  data-card-widget="collapse"
                  title="Collapse"
                >
                  <i class="fas fa-minus"></i>
                </button>
                <button
                  type="button"
                  class="btn btn-tool"
                  data-card-widget="remove"
                  title="Remove"
                >
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="card-body table-responsive p-0">
            <table class="table table-sm table-hover text-nowrap">
              <thead>
                <tr>
                  <th>Opciones</th>
                  <th>Nombre</th>
                  <th>Descripcion</th>
                  <th>Estado</th>
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
                      :labels="{ checked: 'ACTIVADO', unchecked: 'DESACTIVADO' }"
                      :color="{ checked: '#28a745', unchecked: '#dc3545' }"
                      :width="95"
                    />
                    <!-- <toggle-button/> -->
                    <!-- <toggle-button
                      @change="Activar_Desactivar"
                      :value="valorAD"
                      color="#28a745"
                      width="80"
                      height="20"
                      font-size="12"
                      :labels="{checked: 'ACTIVO', unchecked: 'INACTIVO'}"
                    /> -->
                    <!-- <span
                      v-if="categoria.condicion == 1"
                      class="badge bg-success"
                      >Activo</span
                    >
                    <span v-else class="badge bg-danger">Inactivo</span> -->
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">Footer</div>
        <!-- /.card-footer-->
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
// $(function () {
//   $("body").tooltip({
//     selector: '[data-toggle="tooltip"]',
//   });
// });
export default {
  data() {
    return {
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
    listarCategoria() {
      let me = this;
      axios
        .get("/categoria")
        .then(function (response) {
          me.categorias = response.data;
          // Vue.nextTick(function () {
          //   $('[data-toggle="tooltip"]').tooltip();
          // });
          console.log(me.categorias);
        })
        .catch(function (error) {
          console.log(error);
        });
    },
    ListarCategoriaPaginacion() {},
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
    this.listarCategoria();
    $('[data-toggle="tooltip"]').tooltip();
  },
};
</script>
