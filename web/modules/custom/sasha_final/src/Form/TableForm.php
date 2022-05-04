<?php

namespace Drupal\sasha_final\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Creating form for table.
 */
class TableForm extends FormBase {

  /**
   * {@inheritDoc}
   */
  public static function create(ContainerInterface $container): TableForm {
    $instance = parent::create($container);
    $instance->setMessenger($container->get('messenger'));
    return $instance;
  }

  /**
   * Titles of the header.
   *
   * @var parent
   */
  protected $titles;

  /**
   * Initial number of tables.
   *
   * @var int
   */
  protected int $tables = 1;

  /**
   * Initial number of rows.
   *
   * @var int
   */
  protected int $rows = 1;

  /**
   * {@inheritdoc}
   */
  public function getFormId(): string {
    return 'table_form';
  }

  /**
   * A function that returns a table header.
   */
  public function buildTitles(): void {
    $this->titles = [
      'Year' => $this->t('Year'),
      'January' => $this->t('Jan'),
      'February' => $this->t('Feb'),
      'March' => $this->t('Mar'),
      'Q1' => $this->t('Q1'),
      'April' => $this->t('Apr'),
      'May' => $this->t('May'),
      'June' => $this->t('Jun'),
      'Q2' => $this->t('Q2'),
      'Jul' => $this->t('July'),
      'August' => $this->t('Aug'),
      'September' => $this->t('Sep'),
      'Q3' => $this->t('Q3'),
      'October' => $this->t('Oct'),
      'November' => $this->t('Nov'),
      'December' => $this->t('Dec'),
      'Q4' => $this->t('Q4'),
      'YTD' => $this->t('YTD'),
    ];
  }

  /**
   * A function that returns the keys of inactive cells in a table.
   */
  public function inactiveStrings(): array {
    return [
      'Year' => '',
      'Q1' => '',
      'Q2' => '',
      'Q3' => '',
      'Q4' => '',
      'YTD' => '',
    ];
  }

  /**
   * {@inheritDoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state): array {
    $form['#attached']['library'][] = 'sasha_final/sasha_style';
    $form['#prefix'] = '<div id="form-wrapper">';
    $form['#suffix'] = '</div>';
    $form['addTable'] = [
      '#type' => 'submit',
      '#value' => $this->t('Add Table'),
      '#submit' => [
        '::addTable',
      ],
      '#ajax' => [
        'wrapper' => 'form-wrapper',
      ],
      '#limit_validation_errors' => [],

    ];
    $form['addYear'] = [
      '#type' => 'submit',
      '#value' => $this->t('Add Year'),
      '#submit' => [
        '::addYear',
      ],
      '#ajax' => [
        'wrapper' => 'form-wrapper',
      ],
      '#limit_validation_errors' => [],
    ];
    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Submit'),
      '#submit' => [
        '::submitForm',
      ],
      '#ajax' => [
        'wrapper' => 'form-wrapper',
      ],
    ];
    $this->buildTitles();
    $this->buildTable($form, $form_state);
    return $form;
  }

  /**
   * Builds the structure of a table.
   */
  protected function buildTable(array &$form, FormStateInterface $form_state) {
    // Loop for enumeration tables.
    for ($table_amount = 0; $table_amount < $this->tables; $table_amount++) {
      $table_key = 'table-' . ($table_amount + 1);
      // Set special attributes for each table.
      $form[$table_key] = [
        '#type' => 'table',
        '#header' => $this->titles,
      ];
      // Call functions for create rows.
      $this->buildYear($form[$table_key], $form_state, $table_key);
    }
  }

  /**
   * Adding another tables.
   */
  public function addTable(array &$form, FormStateInterface $form_state): array {
    $this->tables++;
    $form_state->setRebuild();
    return $form;
  }

  /**
   * Adding another rows.
   */
  public function addYear(array &$form, FormStateInterface $form_state): array {
    $this->rows++;
    $form_state->setRebuild();
    return $form;
  }

  /**
   * Builds the rows in tables.
   *
   * @param array $table
   *   Main table.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   The current state of the form.
   * @param string $table_key
   *   Table number.
   */
  protected function buildYear(array &$table, FormStateInterface $form_state, string $table_key): void {

    // Call functions for inactive header cell.
    $inactive_cell = $this->inactiveStrings();
    for ($row_amount = $this->rows; $row_amount > 0; $row_amount--) {
      // Set special attributes for each cell.
      foreach ($this->titles as $key => $value) {
        $table[$row_amount][$key] = [
          '#type' => 'number',
          '#step' => 0.01,
        ];
        // Set default value for year cell.
        $table[$row_amount]['Year']['#default_value'] = date("Y") + 1 - $row_amount;
        if (array_key_exists($key, $inactive_cell)) {
          // Set values for inactive cells.
          $cell_value = $form_state->getValue([$table_key, $row_amount, $key]);
          $table[$row_amount][$key]['#default_value'] = round($cell_value, 2);
          // Disable inactive cells.
          $table[$row_amount][$key]['#disabled'] = TRUE;
        }
      }
    }
  }

  /**
   * {@inheritDoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
  }

  /**
   * {@inheritDoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
  }

}
