<?php

namespace Database\Seeders;

use DB;

use Illuminate\Database\Seeder;

class JobSeeder extends Seeder
{

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {

		DB::table('jobs')->truncate();

		/* Jobs */
		$jobs = [
			[ 'id' => 6758, 'title' => 'Vaga para desenvolvedor Javascript', 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque elementum nulla at urna aliquam lobortis. Phasellus ac malesuada justo, et accumsan purus. Suspendisse non efficitur quam. Curabitur vel enim semper ante feugiat viverra id nec diam. Duis ac facilisis mi, quis bibendum nunc.', 'type' => 'clt', 'accepts_application' => true ],
			[ 'id' => 6759, 'title' => 'Remote Junior Laravel Developer', 'description' => 'Cras scelerisque neque at turpis ornare congue vel rutrum enim. Praesent felis velit, fermentum eu porta vel, laoreet non nibh. Etiam vulputate, neque eget ultrices elementum, ante mauris suscipit tortor, nec tincidunt est urna at augue. Pellentesque a dolor eget ligula finibus auctor. Phasellus non sollicitudin mauris. Curabitur tristique neque neque, in vestibulum risus pulvinar vel.', 'type' => 'pj', 'accepts_application' => true ],
			[ 'id' => 6760, 'title' => 'Consultor técnico', 'description' => 'Nam sodales eros id sodales lobortis. Pellentesque auctor erat eu nisi tempus, in eleifend urna accumsan. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Ut nec tempor massa, id tincidunt elit. Aliquam vitae mi a erat eleifend vehicula nec eleifend ligula. Nullam dictum dui a mauris pulvinar, sed sodales neque consequat.', 'type' => 'clt', 'accepts_application' => true ],
			[ 'id' => 6761, 'title' => 'Node.js Developer | Mid/Senior', 'description' => 'Sed diam ipsum, rhoncus ut massa non, aliquet venenatis leo. Donec ac quam pharetra, faucibus augue non, sollicitudin massa. Aliquam eget iaculis orci. Nam id dolor orci. Nullam hendrerit quam quis ante gravida, vitae finibus turpis tincidunt. Aliquam bibendum finibus ligula gravida consectetur.', 'type' => 'freelancer', 'accepts_application' => false ],
			[ 'id' => 6762, 'title' => 'Analista de Sistema Pleno', 'description' => 'Etiam mattis accumsan eleifend. Donec sapien mauris, pharetra vitae consectetur sit amet, interdum non nulla. Ut fringilla tellus eget ante interdum faucibus. Pellentesque ac cursus lorem, sed sagittis lectus. Sed a est posuere, malesuada leo ut, cursus elit.', 'type' => 'freelancer', 'accepts_application' => true ],
			[ 'id' => 6763, 'title' => 'Desenvolvedor de .NET sênior', 'description' => 'Duis vehicula mattis urna, in euismod ligula malesuada nec. Proin et ullamcorper sapien, eget luctus mi. Donec ante erat, volutpat ut dictum at, pulvinar in felis. Donec luctus ligula sed dolor dapibus, quis consequat lorem lacinia. Curabitur interdum metus ut mattis hendrerit.', 'type' => 'freelancer', 'accepts_application' => true ],
			[ 'id' => 6764, 'title' => 'Senior Site Reliability Engineer', 'description' => 'Pellentesque ornare non mauris at vehicula. Phasellus purus neque, vestibulum et hendrerit in, consectetur sed ipsum. Aliquam arcu sapien, mattis non mattis at, rutrum a eros. Integer venenatis nulla at porta ullamcorper. Nam in euismod ex. Nulla varius venenatis tellus, nec tincidunt mi. Proin nisi elit, tincidunt sed felis imperdiet, tempus tempor nibh.', 'type' => 'freelancer', 'accepts_application' => true ],
			[ 'id' => 6765, 'title' => 'Blockchain Developer', 'description' => 'Integer porta leo id dignissim pretium. Etiam a eros nec nibh condimentum hendrerit. Curabitur faucibus nulla tellus, non fermentum est aliquet eget. Aliquam leo dolor, hendrerit vel lectus id, fermentum porta erat. Fusce metus nisl, fringilla sit amet nisi vitae, volutpat porttitor eros. Proin luctus est congue ligula tincidunt, hendrerit pretium augue tincidunt.', 'type' => 'freelancer', 'accepts_application' => true ]
		];

		DB::table('jobs')->insert($jobs);

		$this->command->info(count($jobs) . ' vagas inseridas com sucesso.');
		/* FIM Jobs */

	}

}