
<div class="col-sm-4 col-md-4 col-lg-4">
    <!--    Tìm kiếm    -->
    <div id="search">
        <form method="post" action="outland.php?page_layout=search">
            <label for="place">Nơi khởi hành: </label>
            <select name="place" id="place">
                <option value="Hà Nội">Hà Nội</option>
                <option value="Hồ Chí Minh">Hồ Chí Minh</option>
                <option value="Cần Thơ">Cần Thơ</option>
                <option value="Vũng Tàu">Vũng Tàu</option>
                <option value="Đà Nẵng">Đà Nẵng</option>
                <option value="Nha Trang">Nha Trang</option>
            </select>
            <label for="price1">Giá từ: </label>
            <select name="price1" id="price1">
                <option value="0"> 0 triệu</option>
                <option value="1000000"> 1 triệu</option>
                <option value="2000000"> 2 triệu</option>
                <option value="4000000"> 4 triệu</option>
                <option value="6000000"> 6 triệu</option>
                <option value="8000000"> 8 triệu </option>
            </select>

            <label for="price2">Đến: </label>
            <select name="price2" id="price2">
                <option value="1000000"> 1 triệu</option>
                <option value="2000000"> 2 triệu</option>
                <option value="4000000"> 4 triệu</option>
                <option value="6000000"> 6 triệu</option>
                <option value="8000000"> 8 triệu</option>
                <option value="100000000"> 100 triệu</option>
            </select>

            <!-- <label for="day-start">Ngày khởi hành:</label>
            <select name="day-start" id="day-start">
                <option value="1">21/12/2020</option>
            </select> -->
            <input type="submit" value="Tìm">
        </form>
    </div>
    <!--    Tìm kiếm    -->
</div>