
 <h1 class="title">Quản lí nhân viên</h1>
 <div class="container formAdd">
        <div class="panel panel-info">
        <div class="panel-heading add-goods-header">
            <h3 class="panel-title">Thêm hàng hóa</h3>
            <i class="fas fa-window-close icon-close" onclick="exit()"></i>
        </div>
    <div class="panel-body">
        <form action="goods-type-manager.php" method="POST" role="form">
                    <div class="form-group">
                        <label>TenLoaiHang</label>
                        <input type="text" class="form-control" name='TenLoaiHang' required>
                    </div>
                    
            <button class="btn btn-primary">
                <i class="fas fa-save"></i>
                Lưu
            </button>
            <a type="button" class="btn btn-warning" onclick="exit()">
                <i class="fas fa-undo-alt"></i>
                Thoát</a>
        </form>
    </div>
    </div>
    
    </div>
<div class="container-fluid">
    <div class="add">   
        <button onclick="add()" class="btn btn-success add-Icon">
            <i class="fas fa-plus-square"></i>
            <span> Thêm NV</span>
        </button>
    </div>
    <div class="panel panel-primary">
        <div class="panel-heading">NHÂN VIÊN</div>
        <div class="panel-body">
            <p>Cập nhật từ ngày 18-3-2021</p>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Mã NV</th>
                    <th>Họ tên</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>01</td>
                    <td>LH01</td>
                    <td>Trương Việt Linh</td>
                    <td>
                        <a href="#"><i
                                class="fas fa-pencil-alt mr-3 action-Icon-Update"></i></a>
                        <a href="#"><i class="fas fa-trash-alt action-Icon-Delete"></i></a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>


</div>