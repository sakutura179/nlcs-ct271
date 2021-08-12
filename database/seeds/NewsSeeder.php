<?php

use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert([
            ['category_id' => 1, 'username' => 'khanhs', 
             'header' => 'Mẹo sử dụng tướng mới Akshan – siêu xạ thủ cho vị trí đường giữa', 
             'content' => 
                'Chiêu thức và mẹo sử dụng
                Nội tại: Không từ thủ đoạn
                Mỗi đòn đánh hoặc kỹ năng gây sát thương thứ 3 của Akshan sẽ gây một lượng sát thương vật lý. 
                Nếu kích hoạt trên tướng, hắn nhận thêm một lớp lá chắn và tốc độ di chuyển.',
             'pic' => 'upload/noi-tai.jpg',
             'trending' => true,
             'view' => 30],

            ['category_id' => 2, 'username' => 'ngocj', 
             'header' => 'Bundle Vệ binh ánh sáng sẽ góp mặt Vandal, Sheriff, Operator, Ares và dao', 
             'content' => 
                'Cuộc chiến giữa Viego và những Vệ binh ánh sáng trong sự kiện đang diễn ra trên nhiều tựa game của Riot như Liên Minh Huyền Thoại, Huyền Thoại Runeterra hay Liên Minh Huyền Thoại: Tốc chiến. 
                Đương nhiên, Valorant cũng sẽ có những sự đón nhận cuộc chiến giữa Đại suy vong và Vệ binh ánh sáng trọn vẹn cùng những tựa game anh em của mình.',
             'pic' => 'upload/sentinel.jpg',
             'trending' => true,
             'view' => 28],

            ['category_id' => '4', 'username' => 'hungw', 
             'header' => 'Dota 2: Chính thức công bố thời gian, địa điểm thi đấu The International 10', 
             'content' => 
                'Địa điểm thi đấu
                The International 10 sẽ tổ chức tại sân vận động quốc gia Romania, Arena Nationlaza, nơi có sức chứa tới 55.000 chỗ ngồi. 
                Chưa có thông tin chính thức liệu TI10 năm nay có thể đón khán giả hay không nhưng chắc chắn, trong tình hình dịch bệnh như hiện nay, an toàn và sức khỏe sẽ được ưu tiên hàng đầu.',
             'pic' => 'upload/dota2.jpg',
             'trending' => true,
             'view' => 15],

            ['category_id' => '5', 'username' => 'hana', 
             'header' => 'Cloud9 chính thức thành lập đội tuyển Tốc Chiến', 
             'content' => 
                'Theo đó, Cloud9 đang tích cực tìm kiếm các ứng viên tiềm năng cho đội hình của họ và đã mở đơn đăng ký cho những tuyển thủ muốn thử sức mình ở môi trường thi đấu chuyên nghiệp. 
                Theo đó, đơn đăng ký chỉ yêu cầu một vài thông tin cơ bản của tuyển thủ như tên, tuổi, tên tài khoản ingame, mức rank cao nhất đạt được trong Tốc Chiến và vị trí sở trường cũng như vị trí phụ thường thi đấu.',
             'pic' => 'upload/c9.jpg',
             'trending' => false,
             'view' => 10],
        ]);
    }
}
