<?php

use App\Imports\BranchImport;
use App\Model\Address;
use App\Model\Branch;
use Illuminate\Database\Seeder;

class BranchesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Excel::import(new BranchImport, public_path() . '/csv/setBranchInfo.csv');
        $provinces = [128, 129, 133, 155, 209, 215, 231, 250, 257, 308, 314,
            349, 354, 369, 371, 377, 410, 421, 434, 456, 458, 505, 516, 517, 520, 541, 562, 604, 606, 619, 630, 645, 679, 712, 722, 746, 761, 826, 837, 848, 860, 864, 878, 972, 973, 983, 997, 1013, 1018, 1035, 1042, 1043, 1123, 1124, 1125, 1182, 1186, 1247, 1263, 1265, 1280, 1298, 1339, 1374, 1375, 1376, 1401, 1411, 1427, 1432, 1444, 1481, 1507, 1536, 1538, 1566, 1570, 1602, 1603, 1667, 1668, 1685, 1740, 1751, 1752, 1753, 1759];
        $cities = [12801, 12802, 12803, 12804, 12805, 12806, 12807, 12808, 12809, 12810, 12811, 12812, 12813, 12814, 12815, 12816, 12817, 12818, 12819, 12820, 12821, 12822, 12823, 12901, 12902, 12903, 12904, 12905, 12906, 12907, 12908, 12909, 12910, 12911, 12912, 12913, 12914, 12915, 12916, 12917, 12918, 12919, 12920, 12921, 12922, 12923, 12924, 12925, 12926, 12927, 12928, 12929, 12930, 12931, 12932, 12933, 12934, 13301, 13302, 13303, 13304, 13305, 13306, 13307, 13308, 13309, 13310, 13311, 13312, 13313, 13314, 13315, 13316, 13317, 13318, 13319, 13320, 15501, 15502, 15503, 15504, 15505, 15506, 15507, 15508, 15509, 15510, 15511, 15512, 15513, 15514, 15515, 15516, 15517, 15518, 15519, 15520, 15521, 15522, 15523, 15524, 15525, 15526, 15527, 15528, 15529, 15530, 15531, 15532, 15533, 15534, 15535, 15536, 15537, 15538, 15539, 15540, 15541, 15542, 15543, 15544, 15545, 15546, 15547, 15548, 20901, 20902, 20903, 20904, 20905, 20906, 21501, 21502, 21503, 21504, 21505, 21506, 21507, 21508, 21509, 21510, 21511, 21512, 21513, 21514, 21515, 21516, 21517, 21518, 21519, 21520, 21521, 21522, 21523, 21524, 21525, 21526, 21527, 21528, 21529, 23101, 23102, 23103, 23104, 23105, 23106, 23107, 23108, 23109, 23110, 23111, 23112, 23113, 23114, 23115, 23116, 23117, 23118, 23119, 23120, 23121, 23122, 23123, 23124, 23125, 23126, 23127, 23128, 23129, 23130, 23131, 23132, 23133, 23134, 23135, 23136, 23137, 25001, 25002, 25003, 25004, 25005, 25006, 25007, 25008, 25009, 25010, 25011, 25012, 25013, 25014, 25015, 25701, 25702, 25703, 25704, 25705, 25706, 30801, 30802, 30803, 30804, 30805, 30806, 30807, 30808, 30809, 30810, 30811, 30812, 31401, 31402, 31403, 31404, 31405, 31406, 31407, 31408, 31409, 31410, 31411, 31412, 31413, 31414, 31415, 31416, 31417, 31418, 31419, 31420, 31421, 31422, 31423, 31424, 34901, 34902, 34903, 34904, 34905, 34906, 34907, 34908, 34909, 34910, 34911, 34912, 34913, 34914, 34915, 34916, 34917, 34918, 34919, 34920, 34921, 34922, 34923, 34924, 34925, 34926, 34927, 34928, 34929, 34930, 34931, 34932, 35401, 35402, 35403, 35404, 35405, 35406, 35407, 35408, 35409, 35410, 35411, 35412, 35413, 35414, 35415, 35416, 35417, 35418, 35419, 35420, 35421, 35422, 36901, 36902, 36903, 36904, 36905, 36906, 36907, 36908, 36909, 36910, 36911, 36912, 36913, 36914, 36915, 36916, 36917, 36918, 37101, 37102, 37103, 37104, 37105, 37106, 37107, 37108, 37109, 37110, 37111, 37112, 37113, 37114, 37701, 37702, 37703, 37704, 37705, 37706, 37707, 37708, 41001, 41002, 41003, 41004, 41005, 41006, 41007, 41008, 41009, 41010, 41011, 41012, 41013, 41014, 41015, 41016, 41017, 41018, 41019, 41020, 41021, 41022, 41023, 41024, 41025, 41026, 41027, 41028, 41029, 41030, 41031, 41032, 41033, 41034, 42101, 42102, 42103, 42104, 42105, 42106, 42107, 42108, 42109, 42110, 42111, 42112, 42113, 42114, 42115, 42116, 42117, 42118, 42119, 42120, 42121, 42122, 42123, 43401, 43402, 43403, 43404, 43405, 43406, 43407, 43408, 43409, 43410, 43411, 43412, 43413, 43414, 43415, 43416, 43417, 43418, 43419, 43420, 43421, 43422, 43423, 43424, 43425, 43426, 43427, 43428, 43429, 43430, 45601, 45602, 45603, 45605, 45606, 45607, 45608, 45610, 45615, 45616, 45617, 45618, 45619, 45620, 45621, 45622, 45623, 45624, 45625, 45627, 45628, 45629, 45630, 45631, 45632, 45633, 45634, 45635, 45636, 45637, 45638, 45639, 45640, 45641, 45642, 45644, 45645, 45646, 45647, 45648];
        $faker = Faker\Factory::create();

        for ($i = 1; $i < 10; $i++) {

            $branch = Branch::find($i);
            $newAddress = new Address();
            $newAddress->street_lot_blk = $faker->streetAddress;
            $newAddress->latitude = $faker->latitude($min = 9, $max = 11);
            $newAddress->longitude = $faker->longitude($min = 122, $max = 124);
            $newAddress->country_id = 173;
            $newAddress->region_id = rand(1, 17);
            $newAddress->province_id = $provinces[rand(1, 80)];
            $newAddress->city_id = $cities[rand(1, 65)];
            $newAddress->brgy_id = rand(1, 42029);
            $branch->address()->save($newAddress);

        }
    }
}
