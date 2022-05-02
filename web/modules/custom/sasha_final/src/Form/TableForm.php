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
  public function addTitle(): array {
    return [
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
    $form['addtable'] = [
      '#type' => 'submit',
      '#value' => $this->t('Add table'),
      '#submit' => [
        '::addTable',
      ],
      '#ajax' => [
        'wrapper' => 'form-wrapper',
      ],
      '#limit_validation_errors' => [],

    ];
    $form['addrow'] = [
      '#type' => 'submit',
      '#value' => $this->t('Add row'),
      '#submit' => [
        '::addRow',
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

    $this->addTable($form, $form_state);
    return $form;
  }

  /**
   * Builds the structure of a table.
   */
  protected function addTable(array &$form, FormStateInterface $form_state) {
    // Call functions for build header.
    $headers_cell = $this->addTitle();
    // Loop for enumeration tables.
    for ($table_amount = 0; $table_amount < $this->tables; $table_amount++) {
      $table_key = 'table-' . ($table_amount + 1);
      // Set special attributes for each table.
      $form[$table_key] = [
        '#type' => 'table',
        '#header' => $headers_cell,
      ];
      // Call functions for create rows.
      //$this->rowCreating($form[$table_key], $form_state, $table_key);
    }
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
  public function rowCreating(array &$table, FormStateInterface $form_state, string $table_key) {
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
