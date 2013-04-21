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
          <?php getNode(); ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
