      <!------------------------- 
      |   CONTENIDO PRINCIPAL   | 
      -------------------------->     
   <div>
        <template v-if="menu == 0">
            <home-component></home-component>
        </template>

        <template v-if="menu == 1">
            <categoria-component/>
        </template>
         
        <template v-if="menu == 2">
           <h1> Productos </h1>
        </template>
         
        <template v-if="menu == 3">
           <h1> Proveedores </h1>
        </template>
         
        <template v-if="menu == 4">
           <h1> Ingresos </h1>
        </template>
         
        <template v-if="menu == 5">
           <h1> Clientes </h1>
        </template>
         
        <template v-if="menu == 6">
           <h1> Salidas 6</h1>
        </template>
         
        <template v-if="menu == 7">
           <h1> Usuarios </h1>
        </template>   
        
        <template v-if="menu == 8">
         <h1> Roles </h1>
      </template>

      <template v-if="menu == 9">
         <h1> Reporte Compras </h1>
      </template>

      <template v-if="menu == 10">
         <h1>  Reporte Ventas  </h1>
      </template>


   </div>