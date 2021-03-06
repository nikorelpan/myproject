<?php if (!empty($violatedMarketplaces)): ?>
    <table cellspacing="0" cellpadding="0" border="0" width="100%" class="reportTable sortable">
        <thead>
            <tr class="row_title">
                <th class="overviewtitleTh" width="40%">Marketplace</th>
                <th class="overviewtitleTh" width="20%">Products</th>
                <th class="overviewtitleTh" width="20%">Violations</th>
                <th class="overviewtitleTh" width="20%">Last Tracking</th>
            </tr>
        </thead>
        <tbody><?php
    foreach ($marketplaces as $data):
        $marketIndex = strtolower($data['marketplace']);
        if (!empty($violatedMarketplaces[$marketIndex])):
            $crawl_info = !empty($last_crawl[$marketIndex]) ? $last_crawl[$marketIndex] : FALSE;
            $crawl_start = !empty($crawl_info->start_datetime) ? date('g:i a', strtotime($crawl_info->start_datetime)) : '';
            ?>
                    <tr>
                        <td><a href="<?php echo base_url() . 'violationoverview/report_marketplace/' . $marketIndex; ?>"><?php echo $data['display_name'] ?></a></td>
                        <td><?php echo number_format($data['total_products']); ?></td>
                        <td><?php echo (isset($market_violations[$marketIndex])) ? $market_violations[$marketIndex] : 0; ?></td>
                        <td><?php echo $crawl_start ?></td>
                    </tr><?php
                endif;
            endforeach;
            ?>
        </tbody>
    </table>
<?php else: ?>
    <p>No Marketplace Violations</p>
<?php endif; ?>
