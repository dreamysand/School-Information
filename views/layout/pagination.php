<nav aria-label="Page navigation">
            <ul class="pagination justify-content-center pagination-custom" style="background-color: transparent; text-decoration: none;">
                <?php if (isset($_GET['guru'])): ?>
                    <?php if ($start_show_hal > 1) { ?>
                        <li class="page-item"><a class="page-link" href="?guru&start_show_hal=<?php echo $prev; ?>&search=<?php echo $search; ?>">Prev</a></li>
                    <?php } ?>
                    
                    <?php for ($i = 1; $i <= $total_halaman; $i++) { ?>
                        <li class="page-item"><a class="page-link <?php if ($start_show_hal == $i) echo 'active'; ?>" href="?guru&start_show_hal=<?php echo $i; ?>&search=<?php echo $search; ?>"><?php echo $i; ?></a></li>
                    <?php } ?>
                    
                    <?php if ($start_show_hal < $total_halaman) { ?>
                        <li class="page-item"><a class="page-link" href="?guru&start_show_hal=<?php echo $next; ?>&search=<?php echo $search; ?>">Next</a></li>
                    <?php } ?>
                <?php else: ?>
                    <?php if ($start_show_hal > 1) { ?>
                        <li class="page-item"><a class="page-link" href="?start_show_hal=<?php echo $prev; ?>&search=<?php echo $search; ?>">Prev</a></li>
                    <?php } ?>
                    
                    <?php for ($i = 1; $i <= $total_halaman; $i++) { ?>
                        <li class="page-item"><a class="page-link <?php if ($start_show_hal == $i) echo 'active'; ?>" href="?start_show_hal=<?php echo $i; ?>&search=<?php echo $search; ?>"><?php echo $i; ?></a></li>
                    <?php } ?>
                    
                    <?php if ($start_show_hal < $total_halaman) { ?>
                        <li class="page-item"><a class="page-link" href="?start_show_hal=<?php echo $next; ?>&search=<?php echo $search; ?>">Next</a></li>
                    <?php } ?>
                <?php endif ?>
            </ul>
        </nav>