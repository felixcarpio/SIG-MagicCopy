<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Marquine\Etl\Etl;
use Exception;

class EtlAuto extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'etl:auto';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Comando para ejecutar ETL';

    const fuente = 'STDB';
    const destino = 'mysql';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $etl1 = new Etl;
        $etl2 = new Etl;
        $etl3 = new Etl;
        $etl4 = new Etl;
        $etl5 = new Etl;
        $etl6 = new Etl;
        $etl7 = new Etl;
        $etl8 = new Etl;
        $etl9 = new Etl;
        $etl10 = new Etl;
        $etl11 = new Etl;
        $etl12 = new Etl;
        $etl13 = new Etl;
        $etl14 = new Etl;
        try {
           // var_dump('Entra a try');
            $etl1->extract('query','select * from categorias',['connection'=> self::fuente,])
                 ->transform('trim',['type'=>'both'])->load('insert_update','tbl_categoria',['connection'=>self::destino,'key'=>['id'],'columns'=>[
                    'id'=>'id',
                    'nombre'=>'nombre_categoria',
                    'descripcion'=>'descripcion',
                    'created_at' => 'created_at',
                    'updated_at'=> 'updated_at'
                 ],'timestamps' => false])->run();

             $etl2->extract('table','proveedores',['connection'=> self::fuente])->transform('trim',['type'=>'both'])->load('insert_update','tbl_proveedor',['connection'=>self::destino,'timestamps' => false])->run();

             $etl3->extract('table','marcas',['connection'=> self::fuente])->transform('trim',['type'=>'both'])->load('insert_update','tbl_marca',['connection'=>self::destino,'columns'=>[
                     'id'=>'id',
                     'nombre' => 'nombre_marca',
                     'created_at' => 'created_at',
                    'updated_at'=> 'updated_at'],'timestamps' => false])->run();

             $etl4->extract('table','productos',['connection'=> self::fuente])
                  ->transform('trim',['type'=>'both'])->load('insert_update','tbl_producto',['connection'=>self::destino,'columns'=>[
                     'id'=>'id',
                     'nombre' => 'nombre',
                     'codigo'=>'codigo_producto',
                     'descripcion'=>'descripcion_producto',
                     'precio'=>'precio_producto',
                     'existencias'=>'existencia_producto',
                     'precio_con_descuento'=>'precio_con_descuento',
                     'marcas_id'=>'marca_id',
                     'categorias_id'=>'categoria_id',
                    'created_at' => 'created_at',
                    'updated_at'=> 'updated_at'],'timestamps' => false])->run();

            $etl5->extract('table','producto_proveedor',['connection'=> self::fuente])
                 ->transform('trim',['type'=>'both'])->load('insert_update','tbl_producto_proveedor',['connection'=>self::destino,'columns'=>[
                    'id'=>'id',
                    'producto_id' => 'producto_id',
                    'proveedor_id'=>'proveedor_id',
                    'created_at' => 'created_at',
                    'updated_at'=> 'updated_at'],'timestamps' => false])->run();

            $etl6->extract('query','select * from pedidos_list',['connection'=> self::fuente])
                 ->transform('trim',['type'=>'both'])->load('insert_update','tbl_pedido',['connection'=>self::destino,'columns'=>[
                    'id'=>'id',
                    'codigo' => 'codigo_pedido',
                    'fecha'=>'fecha_solicitud',
                    'comentario'=>'comentario_pedido',
                    'created_at' => 'created_at',
                    'updated_at'=> 'updated_at'],'timestamps' => false])->run();

            $etl7->extract('table','pedido_producto',['connection'=> self::fuente])
                 ->transform('trim',['type'=>'both'])->load('insert_update','tbl_producto_pedido',['connection'=>self::destino,'timestamps' => false])->run();

            $etl8->extract('table','tipos',['connection'=> self::fuente])
                 ->transform('trim',['type'=>'both'])->load('insert_update','tbl_tipo_salida',['connection'=>self::destino,'timestamps' => false])->run();

            $etl9->extract('table','salidas',['connection'=> self::fuente])
                 ->transform('trim',['type'=>'both'])->load('insert_update','tbl_salida',['connection'=>self::destino,'columns'=>[
                    'id'=>'id',
                    'fecha_emision'=>'fecha_emision',
                    'total'=>'total',
                    'comentario'=>'comentario',
                    'correlativo_factura'=>'correlativo_factura',
                    'tipo_factura'=>'tipo_factura',
                    'costo'=>'costo',
                    'total_iva'=>'total_iva',
                    'tipo_id'=>'tipo_id',
                    'created_at' => 'created_at',
                    'updated_at'=> 'updated_at'
                 ],'timestamps' => false])->run();


            $etl10->extract('query','select d.id idDetalle,d.pedido_producto_id,d.total totalDetalle,d.total_con_descuento totalDescuentoDetalle,d.cantidad_vendida cantidadVendidaDetalle,d.existencias existenciasDetalle,d.comentario comentarioDetalle,d.costo costoDetalle,d.salida_id salidaDetalle,d.created_at createdDetalle,d.updated_at updatedDetalle,pp.id,pp.pedido_id pedidoProducto from detalles as d LEFT JOIN pedido_producto as pp on d.pedido_producto_id = pp.id',['connection'=> self::fuente])
                 ->transform('trim',['type'=>'both'])->load('insert_update','tbl_detalle',['connection'=>self::destino,'columns'=>[
                    'idDetalle'=>'id',
                    'totalDetalle'=>'total_detalle',
                    'totalDescuentoDetalle'=>'total_con_desc',
                    'cantidadVendidaDetalle'=>'cantidad_vendida',
                    'existenciasDetalle'=>'existencias',
                    'comentarioDetalle'=>'comentario',
                    'costoDetalle'=>'costo',
                    'pedidoProducto'=>'pedido_id',
                    'salidaDetalle' => 'salida_id',
                    'createdDetalle' => 'created_at',
                    'updatedDetalle'=> 'updated_at'
                 ],'timestamps' => false])->run();

            $etl11->extract('table','compradores',['connection'=> self::fuente])
                 ->transform('trim',['type'=>'both'])->load('insert_update','tbl_comprador',['connection'=>self::destino,'columns'=>[
                    'id'=>'id',
                    'nombre' => 'nombre',
                    'email'=> 'email',
                    'nit'=> 'nit',
                    'dui'=> 'dui',
                    'telefono'=>'telefono',
                    'direccion'=>'direccion',
                    'cuenta'=>'cuenta',
                    'created_at' => 'created_at',
                    'updated_at'=> 'updated_at'
                ],'timestamps' => false])->run();

            $etl12->extract('table','comprador_salida',['connection'=> self::fuente])
                 ->transform('trim',['type'=>'both'])->load('insert_update','tbl_salida_comprador',['connection'=>self::destino,'columns'=>[
                    'id'=>'id',
                    'salida_id' => 'salida_id',
                    'comprador_id'=> 'comprador_id',
                    'created_at' => 'created_at',
                    'updated_at'=> 'updated_at'
                ],'timestamps' => false])->run();

            $etl13->extract('table','entidades',['connection'=> self::fuente])
                 ->transform('trim',['type'=>'both'])->load('insert_update','tbl_entidad',['connection'=>self::destino,'timestamps' => false])->run();

            // //PROBANDO SI HACE MATCH CORRECTAMENTE A PESAR DE TENER EN DIFERENTE POSICION LOS CAMPOS
            $etl14->extract('table','entidad_salida',['connection'=> self::fuente])
                 ->transform('trim',['type'=>'both'])->load('insert_update','tbl_salida_entidad',['connection'=>self::destino,'timestamps' => false])->run();

            $this->info('Exito al cargar los datos.');
            $this->info('|200');

            
        } catch (Exception $e) {
            var_dump($e->getMessage());
            $this->error('Ha ocurrido un error en la transferencia. Intente de nuevo, error:'+$e->getMessage());
            $this->info('|500');
        }
        
    }
}
