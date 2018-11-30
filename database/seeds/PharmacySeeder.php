<?php

use Illuminate\Database\Seeder;
use League\Csv\Reader;

class PharmacySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dbh = DB::connection()->getPdo();
        
        if (!ini_get("auto_detect_line_endings")) {
            ini_set("auto_detect_line_endings", '1');
        }

        $sth = $dbh->prepare(
            "INSERT INTO pharmacies (name, street, city, state, zip, latitude, longitude) VALUES (:name, :street, :city, :state, :zip, :latitude, :longitude)"
        );

        $csv = Reader::createFromPath(base_path().'/database/seeds/pharmacies.csv', 'r')
            ->setHeaderOffset(0)
        ;
        
        //by setting the header offset we index all records
        //with the header record and remove it from the iteration
        
        foreach ($csv as $record) {
            //Do not forget to validate your data before inserting it in your database
            $sth->bindValue(':name', $record['name'], PDO::PARAM_STR);
            $sth->bindValue(':street', $record['address'], PDO::PARAM_STR);
            $sth->bindValue(':city', $record['city'], PDO::PARAM_STR);
            $sth->bindValue(':state', $record['state'], PDO::PARAM_STR);
            $sth->bindValue(':zip', $record['zip'], PDO::PARAM_STR);
            $sth->bindValue(':latitude', $record['latitude'], PDO::PARAM_STR);
            $sth->bindValue(':longitude', $record['longitude'], PDO::PARAM_STR);
            $sth->execute();
        }
    }
}
