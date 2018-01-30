<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    $images = ["http://www.spagobi.org/jira/secure/useravatar?size=xsmall&avatarId=11649", "http://www.spagobi.org/jira/secure/projectavatar?pid=10000&https://jira.fiware.org/secure/projectavatar?avatarId=10011=10011","https://issues.jenkins-ci.org/secure/useravatar?size=small&avatarId=16489","https://issues.jenkins-ci.org/secure/useravatar?size=small&avatarId=16495"];
    $names = ["Paola Balling","Mike Zayac","Gena Gasca","Homer Veneziano","Sarina Kosloski","Sam Hutchings","Jenni Raymo","Sigrid Hohlt","Syreeta Lafever","America Dominquez","Tinisha Saad","Ok Rees","Lisabeth Seago","Collin Stearn","Maranda Muldoon","Santina Weiskopf","Stephan Hagens","Sharika Poirrier","Rolanda Garlow","Grant Patt","Eilene Quillen","Mardell Mansfield","Tamera Galli","Lekisha Butterworth","Lenna Brittan","Palma Featherstone","Gilma Heston","Raymon Selander","Hollis Olesen","Anneliese Jourdan","Sammie Weatherholtz","Bee Martinek","Sommer Oaks","Edward Devereux","Gertrudis Kamin","Scotty Sizelove","Rory Lydon","Forest Frisby","Shirlene Bieniek","Sallie Tack","Crysta Brodie","Jerrod Kube","Octavio Ploof","Sheena Hoelscher","Shirley Messersmith","Tyree Kastner","Jesse Glatt","Minerva Prime","Archie Redondo","Lucio Yoho"];
    foreach ($names as $name) {
        DB::table('users')->insert([
            'name' => $name,
            'email' => str_random(10).'@gmail.com',
            'password' => bcrypt('secret'),
            'birthdate' => date('Y-m-d H:i:s'),
            'img' => array_random($images),
        ]);
    }
    }
}
