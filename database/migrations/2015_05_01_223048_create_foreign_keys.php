<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('tomas_aves', function(Blueprint $table) {
			$table->foreign('ave_id')->references('id')->on('aves')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('tomas_aves', function(Blueprint $table) {
			$table->foreign('medida_biometrica_id')->references('id')->on('medidas_biometricas')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('tomas_aves', function(Blueprint $table) {
			$table->foreign('examen_general_id')->references('id')->on('examenes_generales')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('tomas_aves', function(Blueprint $table) {
			$table->foreign('sitio_id')->references('id')->on('sitios')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('tomas_aves', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('tomas_aves', function(Blueprint $table) {
			$table->foreign('epoca_id')->references('timestamps')->on('epocas')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('parcelas', function(Blueprint $table) {
			$table->foreign('sitio_id')->references('id')->on('sitios')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('parcelas', function(Blueprint $table) {
			$table->foreign('id_planta')->references('id')->on('tipos_plantas')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('tomas_suelos', function(Blueprint $table) {
			$table->foreign('parcela_id')->references('id')->on('parcelas')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('tomas_suelos', function(Blueprint $table) {
			$table->foreign('sitio_id')->references('id')->on('sitios')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('tomas_suelos', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('valores_cauces', function(Blueprint $table) {
			$table->foreign('generalidad_id')->references('id')->on('generalidades')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('valores_cauces', function(Blueprint $table) {
			$table->foreign('tipo_cauce_id')->references('id')->on('tipos_cauces')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('tomas_aguas', function(Blueprint $table) {
			$table->foreign('sitio_id')->references('id')->on('sitios')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('tomas_aguas', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('generalidades', function(Blueprint $table) {
			$table->foreign('clima_id')->references('id')->on('climas')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('generalidades', function(Blueprint $table) {
			$table->foreign('curso_id')->references('id')->on('cursos')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('generalidades', function(Blueprint $table) {
			$table->foreign('parametro_nivel_id')->references('id')->on('parametros_nivel')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('generalidades', function(Blueprint $table) {
			$table->foreign('estructuras_banco_id')->references('id')->on('estructuras_banco')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('generalidades', function(Blueprint $table) {
			$table->foreign('mo_id')->references('id')->on('mos')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('generalidades', function(Blueprint $table) {
			$table->foreign('trabajo_ingenieril_id')->references('id')->on('trabajos_ingenieriles')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('generalidades', function(Blueprint $table) {
			$table->foreign('toma_agua_id')->references('id')->on('tomas_aguas')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('porcentajes_composicion_sustrato', function(Blueprint $table) {
			$table->foreign('tipo_sustrato_id')->references('id')->on('tipos_sustratos')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('porcentajes_composicion_sustrato', function(Blueprint $table) {
			$table->foreign('generalidad_id')->references('id')->on('generalidades')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('porcentajes_condiciones_sustratos', function(Blueprint $table) {
			$table->foreign('tipo_condicion_sustrato_id')->references('id')->on('tipos_condiciones_sustratos')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('porcentajes_condiciones_sustratos', function(Blueprint $table) {
			$table->foreign('generalidad_id')->references('id')->on('generalidades')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('vegetaciones', function(Blueprint $table) {
			$table->foreign('toma_agua_id')->references('id')->on('tomas_aguas')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('porcentajes_exposicion_cauce', function(Blueprint $table) {
			$table->foreign('tipo_exposicion_cauce_id')->references('id')->on('tipos_exposicion_cauce')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('porcentajes_exposicion_cauce', function(Blueprint $table) {
			$table->foreign('vegetacion_id')->references('id')->on('vegetaciones')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('porcentajes_tipo_ribera', function(Blueprint $table) {
			$table->foreign('tipo_ribera_id')->references('id')->on('tipos_riberas')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('porcentajes_tipo_ribera', function(Blueprint $table) {
			$table->foreign('vegetacion_id')->references('id')->on('vegetaciones')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('porcentajes_vegetacion_banco', function(Blueprint $table) {
			$table->foreign('vegetacion_id')->references('id')->on('vegetaciones')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('porcentajes_ambientes_asociados', function(Blueprint $table) {
			$table->foreign('tipo_ambiente_asociado_id')->references('id')->on('tipos_ambientes_asociados')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('porcentajes_ambientes_asociados', function(Blueprint $table) {
			$table->foreign('vegetacion_id')->references('id')->on('vegetaciones')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('caracterizaciones_visuales', function(Blueprint $table) {
			$table->foreign('presencia_rs_id')->references('id')->on('presencia_rs')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('caracterizaciones_visuales', function(Blueprint $table) {
			$table->foreign('cont_puntual_id')->references('id')->on('cont_puntual')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('caracterizaciones_visuales', function(Blueprint $table) {
			$table->foreign('color_agua_id')->references('id')->on('colores_agua')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('caracterizaciones_visuales', function(Blueprint $table) {
			$table->foreign('olor_agua_id')->references('id')->on('olores_agua')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('caracterizaciones_visuales', function(Blueprint $table) {
			$table->foreign('toma_agua_id')->references('id')->on('tomas_aguas')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('medidas_densiometro', function(Blueprint $table) {
			$table->foreign('toma_agua_id')->references('id')->on('tomas_aguas')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('fisico_quimicos', function(Blueprint $table) {
			$table->foreign('toma_agua_id')->references('id')->on('tomas_aguas')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('imagenes_aves', function(Blueprint $table) {
			$table->foreign('toma_ave_id')->references('id')->on('tomas_aves')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
	}

	public function down()
	{
		Schema::table('tomas_aves', function(Blueprint $table) {
			$table->dropForeign('tomas_aves_ave_id_foreign');
		});
		Schema::table('tomas_aves', function(Blueprint $table) {
			$table->dropForeign('tomas_aves_medida_biometrica_id_foreign');
		});
		Schema::table('tomas_aves', function(Blueprint $table) {
			$table->dropForeign('tomas_aves_examen_general_id_foreign');
		});
		Schema::table('tomas_aves', function(Blueprint $table) {
			$table->dropForeign('tomas_aves_sitio_id_foreign');
		});
		Schema::table('tomas_aves', function(Blueprint $table) {
			$table->dropForeign('tomas_aves_user_id_foreign');
		});
		Schema::table('tomas_aves', function(Blueprint $table) {
			$table->dropForeign('tomas_aves_epoca_id_foreign');
		});
		Schema::table('parcelas', function(Blueprint $table) {
			$table->dropForeign('parcelas_sitio_id_foreign');
		});
		Schema::table('parcelas', function(Blueprint $table) {
			$table->dropForeign('parcelas_id_planta_foreign');
		});
		Schema::table('tomas_suelos', function(Blueprint $table) {
			$table->dropForeign('tomas_suelos_parcela_id_foreign');
		});
		Schema::table('tomas_suelos', function(Blueprint $table) {
			$table->dropForeign('tomas_suelos_sitio_id_foreign');
		});
		Schema::table('tomas_suelos', function(Blueprint $table) {
			$table->dropForeign('tomas_suelos_user_id_foreign');
		});
		Schema::table('valores_cauces', function(Blueprint $table) {
			$table->dropForeign('valores_cauces_generalidad_id_foreign');
		});
		Schema::table('valores_cauces', function(Blueprint $table) {
			$table->dropForeign('valores_cauces_tipo_cauce_id_foreign');
		});
		Schema::table('tomas_aguas', function(Blueprint $table) {
			$table->dropForeign('tomas_aguas_sitio_id_foreign');
		});
		Schema::table('tomas_aguas', function(Blueprint $table) {
			$table->dropForeign('tomas_aguas_user_id_foreign');
		});
		Schema::table('generalidades', function(Blueprint $table) {
			$table->dropForeign('generalidades_clima_id_foreign');
		});
		Schema::table('generalidades', function(Blueprint $table) {
			$table->dropForeign('generalidades_curso_id_foreign');
		});
		Schema::table('generalidades', function(Blueprint $table) {
			$table->dropForeign('generalidades_parametro_nivel_id_foreign');
		});
		Schema::table('generalidades', function(Blueprint $table) {
			$table->dropForeign('generalidades_estructuras_banco_id_foreign');
		});
		Schema::table('generalidades', function(Blueprint $table) {
			$table->dropForeign('generalidades_mo_id_foreign');
		});
		Schema::table('generalidades', function(Blueprint $table) {
			$table->dropForeign('generalidades_trabajo_ingenieril_id_foreign');
		});
		Schema::table('generalidades', function(Blueprint $table) {
			$table->dropForeign('generalidades_toma_agua_id_foreign');
		});
		Schema::table('porcentajes_composicion_sustrato', function(Blueprint $table) {
			$table->dropForeign('porcentajes_composicion_sustrato_tipo_sustrato_id_foreign');
		});
		Schema::table('porcentajes_composicion_sustrato', function(Blueprint $table) {
			$table->dropForeign('porcentajes_composicion_sustrato_generalidad_id_foreign');
		});
		Schema::table('porcentajes_condiciones_sustratos', function(Blueprint $table) {
			$table->dropForeign('porcentajes_condiciones_sustratos_tipo_condicion_sustrato_id_foreign');
		});
		Schema::table('porcentajes_condiciones_sustratos', function(Blueprint $table) {
			$table->dropForeign('porcentajes_condiciones_sustratos_generalidad_id_foreign');
		});
		Schema::table('vegetaciones', function(Blueprint $table) {
			$table->dropForeign('vegetaciones_toma_agua_id_foreign');
		});
		Schema::table('porcentajes_exposicion_cauce', function(Blueprint $table) {
			$table->dropForeign('porcentajes_exposicion_cauce_tipo_exposicion_cauce_id_foreign');
		});
		Schema::table('porcentajes_exposicion_cauce', function(Blueprint $table) {
			$table->dropForeign('porcentajes_exposicion_cauce_vegetacion_id_foreign');
		});
		Schema::table('porcentajes_tipo_ribera', function(Blueprint $table) {
			$table->dropForeign('porcentajes_tipo_ribera_tipo_ribera_id_foreign');
		});
		Schema::table('porcentajes_tipo_ribera', function(Blueprint $table) {
			$table->dropForeign('porcentajes_tipo_ribera_vegetacion_id_foreign');
		});
		Schema::table('porcentajes_vegetacion_banco', function(Blueprint $table) {
			$table->dropForeign('porcentajes_vegetacion_banco_vegetacion_id_foreign');
		});
		Schema::table('porcentajes_ambientes_asociados', function(Blueprint $table) {
			$table->dropForeign('porcentajes_ambientes_asociados_tipo_ambiente_asociado_id_foreign');
		});
		Schema::table('porcentajes_ambientes_asociados', function(Blueprint $table) {
			$table->dropForeign('porcentajes_ambientes_asociados_vegetacion_id_foreign');
		});
		Schema::table('caracterizaciones_visuales', function(Blueprint $table) {
			$table->dropForeign('caracterizaciones_visuales_presencia_rs_id_foreign');
		});
		Schema::table('caracterizaciones_visuales', function(Blueprint $table) {
			$table->dropForeign('caracterizaciones_visuales_cont_puntual_id_foreign');
		});
		Schema::table('caracterizaciones_visuales', function(Blueprint $table) {
			$table->dropForeign('caracterizaciones_visuales_color_agua_id_foreign');
		});
		Schema::table('caracterizaciones_visuales', function(Blueprint $table) {
			$table->dropForeign('caracterizaciones_visuales_olor_agua_id_foreign');
		});
		Schema::table('caracterizaciones_visuales', function(Blueprint $table) {
			$table->dropForeign('caracterizaciones_visuales_toma_agua_id_foreign');
		});
		Schema::table('medidas_densiometro', function(Blueprint $table) {
			$table->dropForeign('medidas_densiometro_toma_agua_id_foreign');
		});
		Schema::table('fisico_quimicos', function(Blueprint $table) {
			$table->dropForeign('fisico_quimicos_toma_agua_id_foreign');
		});
		Schema::table('imagenes_aves', function(Blueprint $table) {
			$table->dropForeign('imagenes_aves_toma_ave_id_foreign');
		});
	}
}