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

    const fuente = 'dbt';
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
            $etl1=extract('table','categorias',['connection'=> self::fuente])
                 ->transform('trim',['type'=>'both'])->load('insert_update','tbl_categoria',['connection'=>self::destino,'columns'=>[
                    'id'=>'id',
                    'nombre_categoria' => 'nombre',
                    'descripcion'=>'descripcion'
                 ]])->run();

            $etl2=extract('table','proveedores',['connection'=> self::fuente])
                 ->transform('trim',['type'=>'both'])->load('insert_update','tbl_proveedor',['connection'=>self::destino])->run();

            $etl3=extract('table','marcas',['connection'=> self::fuente])
                 ->transform('trim',['type'=>'both'])->load('insert_update','tbl_marca',['connection'=>self::destino,'columns'=>[
                    'id'=>'id',
                    'nombre_marca' => 'nombre']])->run();

            $etl4=extract('table','productos',['connection'=> self::fuente])
                 ->transform('trim',['type'=>'both'])->load('insert_update','tbl_producto',['connection'=>self::destino,'columns'=>[
                    'id'=>'id',
                    'nombre' => 'nombre',
                    'codigo_producto'=>'codigo',
                    'descripcion_producto'=>'descripcion',
                    'precio_producto'=>'precio',
                    'existencia_producto'=>'existencias',
                    'precio_con_descuento'=>'precio_con_descuento',
                    'marca_id'=>'marcas_id',
                    'categoria_id'=>'categorias_id']])->run();

            $etl5=extract('table','producto_proveedor',['connection'=> self::fuente])
                 ->transform('trim',['type'=>'both'])->load('insert_update','tbl_producto_proveedor',['connection'=>self::destino,'columns'=>[
                    'id'=>'id',
                    'producto_id' => 'producto_id',
                    'proveedor_id'=>'proveedor_id']])->run();

            $etl6=extract('table','pedidos',['connection'=> self::fuente])
                 ->transform('trim',['type'=>'both'])->load('insert_update','tbl_pedido',['connection'=>self::destino,'columns'=>[
                    'id'=>'id',
                    'codigo_pedido' => 'codigo',
                    'fecha_solicitud'=>'fecha_solicitud',
                    'comentario_pedido'=>'comentario']])->run();

            $etl7=extract('table','pedido_producto',['connection'=> self::fuente])
                 ->transform('trim',['type'=>'both'])->load('insert_update','tbl_producto_pedido',['connection'=>self::destino])->run();

            $etl8=extract('table','tipos',['connection'=> self::fuente])
                 ->transform('trim',['type'=>'both'])->load('insert_update','tbl_tipo_salida',['connection'=>self::destino])->run();

            $etl9=extract('table','salidas',['connection'=> self::fuente])
                 ->transform('trim',['type'=>'both'])->load('insert_update','tbl_salida',['connection'=>self::destino,'columns'=>[
                    'id'=>'id',
                    'fecha_emision'=>'fecha_emision',
                    'total'=>'total',
                    'comentario'=>'comentario',
                    'correlativo_factura'=>'correlativo_factura',
                    'tipo_factura'=>'tipo_factura',
                    'costo'=>'costo',
                    'total_iva'=>'total_iva',
                    'tipo_id'=>'tipo_id'
                 ]])->run();


            $etl10=extract('query','select d.*,pp.* from detalles d LEFT JOIN pedido_producto pp where d.pedido_producto_id = pp.id',['connection'=> self::fuente])
                 ->transform('trim',['type'=>'both'])->load('insert_update','tbl_detalle',['connection'=>self::destino,'columns'=>[
                    'id'=>'id',
                    'total_detalle'=>'d.total',
                    'total_con_desc'=>'d.total_con_descuento',
                    'cantidad_vendida'=>'d.cantidad_vendida',
                    'existencias'=>'d.existencias',
                    'comentario'=>'d.comentario',
                    'costo'=>'d.costo',
                    'pedido_id'=>'pp.pedido_id',
                    'salida_id' => 'd.salida_id'
                 ]])->run();

            $etl11=extract('table','compradores',['connection'=> self::fuente])
                 ->transform('trim',['type'=>'both'])->load('insert_update','tbl_comprador',['connection'=>self::destino,'columns'=>[
                    'id'=>'id',
                    'nombre' => 'nombre',
                    'email'=> 'email',
                    'nit'=> 'nit',
                    'dui'=> 'dui',
                    'telefono'=>'telefono',
                    'direccion'=>'direccion',
                    'cuenta'=>'cuenta'
                ]])->run();

            $etl12=extract('table','comprador_salida',['connection'=> self::fuente])
                 ->transform('trim',['type'=>'both'])->load('insert_update','tbl_salida_comprador',['connection'=>self::destino,'columns'=>[
                    'id'=>'id',
                    'salida_id' => 'salida_id',
                    'comprador_id'=> 'comprador_id',
                ]])->run();

            $etl13=extract('table','entidades',['connection'=> self::fuente])
                 ->transform('trim',['type'=>'both'])->load('insert_update','tbl_entidad',['connection'=>self::destino])->run();

            //PROBANDO SI HACE MATCH CORRECTAMENTE A PESAR DE TENER EN DIFERENTE POSICION LOS CAMPOS
            $etl14=extract('table','entidad_salida',['connection'=> self::fuente])
                 ->transform('trim',['type'=>'both'])->load('insert_update','tbl_salida_entidad',['connection'=>self::destino])->run();

            $this->info('Exito al cargar los datos.');
            $this->info('|200');

            
        } catch (Exception $e) {
            $this->error('Ha ocurrido un error en la transferencia. Intente de nuevo, error:'+$e->getMessage());
            $this->info('|500');
        }
        
    }
}
