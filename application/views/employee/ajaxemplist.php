    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                            <th>Emp code</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Department</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                      </thead>
                      <tbody>
                       <?php 
                    
                    if($employee_dtls) {

                        
                            foreach($employee_dtls as $e_dtls) {

                    ?>
                         <tr>

                                <td><?php echo $e_dtls->emp_code; ?></td>
                                <td><?php echo $e_dtls->emp_name; ?></td>
                                <td><?php 
                                
                                    foreach($category_dtls as $c_list) {

                                        if($e_dtls->emp_catg == $c_list->category_code) {
                                            
                                            echo $c_list->category_type;

                                        }

                                    }
                                ?>
                                </td>
                                <td><?php echo $e_dtls->department; ?></td>
                                
                                <td>
                                <a href="estem?emp_code=<?php echo $e_dtls->emp_code; ?>" 
                                    data-toggle="tooltip"
                                    data-placement="bottom" 
                                    title="Edit">
                                    <i class="fa fa-edit fa-2x" style="color: #007bff"></i>
                                      </a>
                            
                                </td>

                                <td>
                                  <a type="button" class="delete" id="<?php echo $e_dtls->emp_code; ?>" data-toggle="tooltip" data-placement="bottom" title="Delete">
                                        <i class="fa fa-trash fa-2x" ></i>
                                  </a>
                                </td>
                            </tr>
                    <?php
                            
                            }
                        }
                        else {
                            echo "<tr><td colspan='10' style='text-align: center;'>No data Found</td></tr>";
                        }
                    ?>
                      </tbody>
    </table>