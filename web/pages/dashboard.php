<!--Main Content-->

<div class="span9">
  <h1 class="page-title">LinMon Dashboard</h1>
  <div class="module module-table">
    <div class="module-header">
      <h3><i class="icon-tasks"></i>&nbsp;&nbsp;Nodes</h3>
    </div>
    <div class="module-content">
      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>Node Name</th>
            <th>Memory</th>
            <th>Load Average</th>
            <th>Status</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Ger-1</td>
            <td class="memory"><div class="progress progress-striped active progress-success">
                <div class="bar" style="width: 40%;">40%</div>
              </div></td>
            <td>3.82</td>
            <td class="status"><span class="label label-success">Online</span></td>
            <td class="actions"><a href="#" class="btn btn-small btn-info"><i class="icon-search"></i></a> <a href="#" class="btn btn-small btn-success"><i class="icon-remove"></i></a></td>
          </tr>
          <tr>
            <td>Can-1</td>
            <td class="memory"><div class="progress progress-striped active progress-danger">
                <div class="bar" style="width: 95%;">95%</div>
              </div></td>
            <td>2.19</td>
            <td class="status"><span class="label label-success">Online</span></td>
            <td class="actions"><a href="#" class="btn btn-small btn-info"><i class="icon-search"></i></a> <a href="#" class="btn btn-small btn-success"><i class="icon-remove"></i></a></td>
          </tr>
          <tr>
            <td>Fra-1</td>
            <td class="memory"><div class="progress progress-striped active progress-warning">
                <div class="bar" style="width: 74%;">74%</div>
              </div></td>
            <td>4.59</td>
            <td class="status"><span class="label label-important">Offline</span></td>
            <td class="actions"><a href="#" class="btn btn-small btn-info"><i class="icon-search"></i></a> <a href="#" class="btn btn-small btn-success"><i class="icon-remove"></i></a></td>
          </tr>
          <tr>
            <td>Fra-2</td>
           	<td class="memory"><div class="progress progress-striped active progress-success">
                <div class="bar" style="width: 25%;">25%</div>
              </div></td>
            <td>1.98</td>
            <td class="status"><span class="label label-success">Online</span></td>
            <td class="actions"><a href="#" class="btn btn-small btn-info"><i class="icon-search"></i></a> <a href="#" class="btn btn-small btn-success"><i class="icon-remove"></i></a></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
<!-- Memory usage bands: 
 < 70% green
 71%-85% orange
 86%-100% red
 -->