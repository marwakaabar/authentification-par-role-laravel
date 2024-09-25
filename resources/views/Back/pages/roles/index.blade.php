@extends('Back.admin')
@section('content') 
          <div class="page-inner">
            <div class="page-header">
              <h3 class="fw-bold mb-3">Liste des Roles</h3>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <div class="d-flex align-items-center">
                      <h4 class="card-title">Ajouter Role</h4>
                      <button
                        class="btn btn-primary btn-round ms-auto"
                        data-bs-toggle="modal"
                        data-bs-target="#addRowModal"
                      >
                        <i class="fa fa-plus"></i>
                        Ajouter Role
                      </button>
                    </div>
                  </div>
                  <div class="card-body">
                    <!-- Modal   add  -->
                    <div
                      class="modal fade"
                      id="addRowModal"
                      tabindex="-1"
                      role="dialog"
                      aria-hidden="true"
                    >
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header border-0">
                            <h5 class="modal-title">
                              <span class="fw-mediumbold"> Ajouter un</span>
                              <span class="fw-light"> Role </span>
                            </h5>
                            <button
                              type="button"
                              class="close"
                              data-dismiss="modal"
                              aria-label="Close"
                            >
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <p class="small">
                              Créer un nouveau Role
                            </p>
                            <form action="{{ route('role.store') }}" method="POST">
                            @csrf 
                            <div class="row">
                                <div class="col-sm-12">
                                  <div class="form-group form-group-default">
                                    <label>Nom</label>
                                    <input
                                      id="addName"
                                      type="text"
                                      name="nom"
                                      class="form-control"
                                      placeholder="nom du role"
                                      requied
                                    />
                                  </div>
                                </div>
                                <div class="col-sm-12">
                                  <div class="form-group form-group-default">
                                    <label>Description</label>
                                    <input
                                      id="addDescription"
                                      type="text"
                                      name="description"
                                      class="form-control"
                                      placeholder="Description Produit"
                                      required
                                    />
                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer border-0">
                            <button
                              type="submit"
                              id="addRowButton"
                              class="btn btn-primary"
                            >
                              Ajouter
                            </button>
                            <button
                              type="cancel"
                              class="btn btn-danger"
                              data-dismiss="modal"
                            >
                              Annuler
                            </button>
                          </div>
                            </form>
                          </div>
                         
                        </div>
                      </div>
                    </div>
<!-- Modal Modification -->
<div
  class="modal fade"
  id="editRowModal"
  tabindex="-1"
  role="dialog"
  aria-hidden="true"
>
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header border-0">
        <h5 class="modal-title">
          <span class="fw-mediumbold">Modifier</span>
          <span class="fw-light"> Rôle </span>
        </h5>
        <button
          type="button"
          class="close"
          data-dismiss="modal"
          aria-label="Close"
        >
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p class="small">
          Modifier le rôle sélectionné
        </p>
        <form id="editRoleForm" action="" method="POST">
          @csrf 
          @method('PUT')
          <div class="row">
            <div class="col-sm-12">
              <div class="form-group form-group-default">
                <label>Nom</label>
                <input
                  id="editName"
                  type="text"
                  name="nom"
                  class="form-control"
                  placeholder="nom du rôle"
                  required
                />
              </div>
            </div>
            <div class="col-sm-12">
              <div class="form-group form-group-default">
                <label>Description</label>
                <input
                  id="editDescription"
                  type="text"
                  name="description"
                  class="form-control"
                  placeholder="Description du rôle"
                  required
                />
              </div>
            </div>
          </div>
          <div class="modal-footer border-0">
            <button
              type="submit"
              class="btn btn-primary"
            >
              Mettre à jour
            </button>
            <button
              type="button"
              class="btn btn-danger"
              data-dismiss="modal"
            >
              Annuler
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

                    <div class="table-responsive">
                      <table
                        id="add-row"
                        class="display table table-striped table-hover"
                      >
                        <thead>
                          <tr>
                            <th>Nom</th>
                            <th>Description</th>
                            <th style="width: 10%">Action</th>
                          </tr>
                        </thead>
                        <tfoot>

                          <tr>
                            <th>Nom</th>
                            <th>Description</th>
                            <th>Action</th>
                          </tr>
                        </tfoot>
                        <tbody>
                        @foreach($role as $role)
  <tr>
    <td>{{ $role->nom }}</td>
    <td>{{ $role->description }}</td>
    <td>
      <div style="display: flex; align-items: center;">
        <button
          class="btn btn-link btn-primary"
          title="Modifier le Rôle"
          data-bs-toggle="modal"
          data-bs-target="#editRowModal"
          onclick="setEditRoleData('{{ $role->id }}', '{{ $role->nom }}', '{{ $role->description }}')"
        >
          <i class="fa fa-edit"></i>
        </button>
        <form action="{{ route('role.destroy', $role->id) }}" method="POST" style="display:inline;">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-link btn-danger" title="Supprimer">
            <i class="fa fa-times"></i>
          </button>
        </form>
      </div>
    </td>
  </tr>
@endforeach

                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
      

    </div>
    <!--   Core JS Files   -->
    <script src="../js/core/jquery-3.7.1.min.js"></script>
    <script src="../js/core/popper.min.js"></script>
    <script src="../js/core/bootstrap.min.js"></script>

    <!-- jQuery Scrollbar -->
    <script src="../js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
    <!-- Datatables -->
    <script src="../js/plugin/datatables/datatables.min.js"></script>
    <!-- Kaiadmin JS -->
    <script src="../js/kaiadmin.min.js"></script>
    <!-- Kaiadmin DEMO methods, don't include it in your project! -->
    <script src="../js/setting-demo2.js"></script>
    <script>
      $(document).ready(function () {
        $("#basic-datatables").DataTable({});

        $("#multi-filter-select").DataTable({
          pageLength: 5,
          initComplete: function () {
            this.api()
              .columns()
              .every(function () {
                var column = this;
                var select = $(
                  '<select class="form-select"><option value=""></option></select>'
                )
                  .appendTo($(column.footer()).empty())
                  .on("change", function () {
                    var val = $.fn.dataTable.util.escapeRegex($(this).val());

                    column
                      .search(val ? "^" + val + "$" : "", true, false)
                      .draw();
                  });

                column
                  .data()
                  .unique()
                  .sort()
                  .each(function (d, j) {
                    select.append(
                      '<option value="' + d + '">' + d + "</option>"
                    );
                  });
              });
          },
        });

        // Add Row
        $("#add-row").DataTable({
          pageLength: 5,
        });

        var action =
          '<td> <div class="form-button-action"> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';
          $("#addRowButton").click(function () {
    // Assurez-vous que vous avez le même nombre de données que de colonnes dans le tableau
    $("#add-row").dataTable().fnAddData([
        $("#addName").val(),        // 1ère colonne: Nom
        $("#addDescription").val(), // 4ème colonne: Description
        action                      // 5ème colonne: Action (boutons modifier/supprimer)
    ]);
    $("#addRowModal").modal("hide");
});

}); 

      

    </script>
    <script>
function setEditRoleData(id, name, description) {
    // Mettre à jour l'action du formulaire
    document.getElementById('editRoleForm').action = '/role/' + id; // Assurez-vous que c'est la bonne URL

    // Remplir les champs du modal
    document.getElementById('editName').value = name;
    document.getElementById('editDescription').value = description;
}
</script>

@endsection